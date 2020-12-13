<?php

namespace App\Http\Controllers;

use App\Option;
use App\Payment;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function advertise()
    {
        $option = Option::find(10);
        $option = $option ?? Option::create(['id' => 10, 'main' => 10000]);

        return view('dashboard.advertise',compact('option'));
    }

    public function payAds()
    {
        $user = auth()->user();

        $price = Option::find(10);
        $price = $price ? $price->main : 10000;

        session(['ads-price' => $price]);

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc'; //Required
        $Amount = $price; //Amount will be based on Toman - Required
        $Description = 'حذف تبلیغات'; // Required
        $CallbackURL = route('user.dashboard.payAdsCallback'); // Required

        $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'CallbackURL' => $CallbackURL,
            ]
        );

        if ($result->Status == 100) {
            return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }

    }

    public function payAdsCallback(Request $request)
    {
        $user = auth()->user();

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc';
        $Amount =  session('ads-price');
        $Authority = $request->Authority;

        if ($request->Status == 'OK') {

            $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            if ($result->Status == 100) {
                $pay = new Payment();
                $pay->user_id = $user->id;
                $pay->trans_id = $result->RefID;
                $pay->restaurant_id = 0;
                $pay->products = 'advertise'.auth()->id();
                $pay->save();
                $message = 'تبلیغات با موفقیت حذف شد.';
                $message .= '<br>';
                $message .= 'شماره پیگیری بانک : ';
                $message .= $pay->trans_id;
                $message .= '<br>';

            } else {
                $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
            }
        } else {
            $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
        }

        return view('user.complete', compact('message'));
    }

}
