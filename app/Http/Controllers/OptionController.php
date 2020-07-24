<?php

namespace App\Http\Controllers;

use App\Option;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function detail ()
    {
        $this->middleware('Access:settings');

        $user = User::find(auth()->id());
        $res=Restaurant::find($user->res_id);
        $res->options = $res->options;
        return view('admin.detailsRes' , compact('res'));
    }

    public function editDetail (Request $request)
    {
        $this->middleware('Access:settings');

        $res = Restaurant::find(auth()->id());
        $request->validate([
            'img' => 'mimes:jpeg,bmp,jpg,png|max:500kb'
        ]);
        $options = [];
        $res->name= $request->name;
        $options['start']= $request->time1;
        $options['address']= $request->address;
        $options['end']= $request->time2;
        $options['delivery']= $request->delivery;
        $options['wifi']= $request->wifi;
        $options['game']= $request->game;
        $options['park']= $request->park;
        $options['child_bench']= $request->child_bench;
        $options['kart']= $request->kart;
        $options['music']= $request->music;
        $options['details']= $request->details;
        $res->options = $options;
        $file = $request->file('img');
        if ( $request->hasFile('img') && !is_null($request->img) ) {
            $path = random_int(0 , 99999).time().'_.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('upload') , $path);
            $imgPath = $path;
            $res->pics = [$imgPath];
        }
        $res->save();
        return redirect(url('manager/detail-res'));
    }

    public function aboutUs()
    {
        $op = Option::first();
        return view('admin.aboutUs',compact('op'));
    }

    public function addAbout(Request $request)
    {
        $op = Option::first();
        $op->main = $request->main;
        $op->save();
        return redirect('admin/about-us');
    }

    public function benefits()
    {
        $op = Option::find(1);
        return view('admin.benefits',compact('op'));
    }

    public function addBenefits(Request $request)
    {
        $op = Option::find(1);
        $op->main = $request->main;
        $op->save();
        return redirect('admin/benefits');
    }

    public function upload(Request $request)
    {

        /*******************************************************
         * Only these origins will be allowed to upload images *
         ******************************************************/
        $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com","http://iranbaguette.com");

        /*********************************************
         * Change this line to set the upload folder *
         *********************************************/
        $imageFolder = 'upload/';
        dd($request);
        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            if (isset($_SERVER['HTTP_ORIGIN'])) {
                // same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                } else {
                    header("HTTP/1.1 403 Origin Denied");
                    return;
                }
            }

            /*
              If your script needs to receive cookies, set images_upload_credentials : true in
              the configuration and enable the following two headers.
            */
            // header('Access-Control-Allow-Credentials: true');
            // header('P3P: CP="There is no P3P policy."');

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            move_uploaded_file($temp['tmp_name'], $filetowrite);
            $filetowrite = '../public/'.$filetowrite;
            // Respond to the successful upload with JSON.
            // Use a location key to specify the path to the saved image resource.
            // { location : '/your/uploaded/image/file'}
            echo json_encode(array('location' => $filetowrite));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }


    }

}
