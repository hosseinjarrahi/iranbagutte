<?php

namespace App\Http\Controllers;

use App\Buycode;
use App\Food;
use App\Payment;
use App\Cyberspace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BasketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'add', 'remove']);
    }

    public function show()
    {
        $basket = unserialize(session('basket'));
        if ($basket == null) $basket = [];
        $cyberspace = Cyberspace::get();
        return view('user.basket', compact('basket', 'cyberspace'));
    }

    public function add($id, Request $request)
    {
        $id = (int)$id;
        $counter = $request->count;
        if (is_integer($id)) {
            $count = (session('count') != null) ? session('count') : 0;
            $basket = unserialize(session('basket'), ["allowed_classes" => false]);
            $product = Food::find($id);
            if (isset($basket[$id])) {
                $basket[$id]['count'] += $counter;
            } else {
                $basket[$id] = ['restaurant_id' => $product->restaurant->id, 'price' => $product->price, 'name' => $product->title, 'img' => $product->img, 'count' => $counter];
                $count++;
            }
            session(['basket' => serialize($basket)]);
            session(['count' => $count]);
        }
        return redirect(rtrim($_SERVER['HTTP_REFERER'], '/alert') . '/alert');
    }

    public function remove($id)
    {
        $id = (int)$id;
        if (is_integer($id)) {
            $basket = unserialize(session('basket'), ["allowed_classes" => false]);
            if (isset($basket[$id])) {
                unset($basket[$id]);
                session(['basket' => serialize($basket)]);
                $count = session('count');
                $count--;
                session(['count' => $count]);
            }
        }
        return redirect('/basket');
    }

    public function checkout()
    {
        if (!auth()->check()) return redirect('/login');

        $user = auth()->user();

        if ($user->address == null || $user->phone == null) {
            return redirect('/edit');
        }

        $basket = session('basket');

        if ($basket) {

            $basket = unserialize($basket, ["allowed_classes" => false]);

            $jam = 0;

            foreach ($basket as $pid => $value) {
                $p = Food::find($pid);
                if (isset($p))
                    $jam += $p->price * (1 - $p->off / 100);
            }

            session(['jam' => $jam]);

            $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc'; //Required
            $Amount = $jam; //Amount will be based on Toman - Required
            $Description = 'خرید از ایران باگت'; // Required
            $CallbackURL = route('reply.to.pay'); // Required


            $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentRequest(
                [
                    'MerchantID' => $MerchantID,
                    'Amount' => $Amount,
                    'Description' => $Description,
                    'CallbackURL' => $CallbackURL,
                ]
            );

            //Redirect to URL You can do it also by creating a form
            if ($result->Status == 100) {
                return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
            } else {
                echo 'ERR: ' . $result->Status;
            }

        } else
            return redirect('/');
    }

    public function reply(Request $request)
    {
        if (!auth()->check()) return redirect('/login');

        $code = false;
        $user = auth()->user();

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc';
        $Amount = session('jam'); //Amount will be based on Toman
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
                $products = session('basket');
                $products = collect(unserialize($products, ["allowed_classes" => false]));
                $products = $products->groupBy('restaurant_id');
                foreach ($products as $index => $product) {
                    $p = serialize($product);
                    $pay = new Payment();
                    $pay->user_id = $user->id;
                    $pay->trans_id = $result->RefID;
                    $pay->restaurant_id = $index;
                    $pay->products = $p;
                    $pay->save();
                    $message = 'محصول با موفقیت خرید شد.';
                    $message .= '<br>';
                    $message .= 'شماره پیگیری بانک : ';
                    $message .= $pay->trans_id;
                    $message .= '<br>';
                }
                session()->forget('basket');
                session()->forget('count');
                $code = random_int(100000, 99999999);
                Buycode::create(['user_id' => auth()->id(), 'code' => $code]);
            } else {
                $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
            }
        } else {
            $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
        }


        return view('user.complete', compact('message', 'code'));
    }

    public function runBuycode($buycode)
    {
        if (!auth()->check()) return redirect('/login');

        $bc = Buycode::where('user_id', auth()->id())->where('id', $buycode)->first();
        $p = Food::find($bc->product_id);
        $user = auth()->user();
        session(['p' => $p->id]);
        session(['b' => $bc->id]);
        if ($bc->percent == 100) {
            $p = serialize($p);
            $pay = new Payment();
            $pay->user_id = $user->id;
            $pay->trans_id = 0;
            $pay->restaurant_id = $p->restaurant_id;
            $pay->products = $p;
            $pay->save();
            $message = 'محصول با موفقیت خرید شد.';
            $message .= '<br>';
            $message .= 'شماره پیگیری بانک : ';
            $message .= $pay->trans_id;
            $message .= '<br>';
            return view('user.complete', compact('message'));
        }

        if ($user->address == null || $user->phone == null) {
            return redirect('/edit');
        }


        if ($p) {

            $jam = 0;

            $jam += $p->price * (1 - $bc->percent / 100);

            session(['jam' => $jam]);

            $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc'; //Required
            $Amount = $jam; //Amount will be based on Toman - Required
            $Description = 'خرید از ایران باگت'; // Required
            $CallbackURL = route('reply.buycode'); // Required

            $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentRequest(
                [
                    'MerchantID' => $MerchantID,
                    'Amount' => $Amount,
                    'Description' => $Description,
                    'CallbackURL' => $CallbackURL,
                ]
            );

            //Redirect to URL You can do it also by creating a form
            if ($result->Status == 100) {
                return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
            } else {
                echo 'ERR: ' . $result->Status;
            }

        } else
            return redirect('/');
    }

    public function replyBuycode(Request $request)
    {
        if (!auth()->check()) return redirect('/login');

        $code = false;
        $user = auth()->user();

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc';
        $Amount = session('jam'); //Amount will be based on Toman
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
                $p = session('p');
                $p = Food::find($p);
                $pay = new Payment();
                $pay->user_id = $user->id;
                $pay->trans_id = $result->RefID;
                $pay->restaurant_id = $p->restaurant_id;
                $pay->products = $p;
                $pay->save();
                $message = 'محصول با موفقیت خرید شد.';
                $message .= '<br>';
                $message .= 'شماره پیگیری بانک : ';
                $message .= $pay->trans_id;
                $message .= '<br>';
                $b = session('b');
                Buycode::where(['id' => $b])->update(['get' => true]);
            } else {
                $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
            }
        } else {
            $message = 'مشکلی در پرداخت به وجود آمده است.درصورت کسر وجه تا 1 ساعت مبلغ به حسابتان باز خواهد گشت.';
        }


        return view('user.complete', compact('message', 'code'));
    }

    public function status()
    {
        if (!auth()->check()) return redirect('/login');
        $user = auth()->user();
        $pays = $user->payments;
        return view('user.status', compact('pays'));
    }

    public function takmil()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function takmiler(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'name' => 'required',
        ]);
        $user = auth()->user();
        $errors = [];
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->save();
        return back();
    }

}
