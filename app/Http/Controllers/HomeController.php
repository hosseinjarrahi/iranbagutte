<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Buycode;
use App\Category;
use App\Food;
use App\Game;
use App\Option;
use App\Reserve;
use App\Restaurant;
use App\Slide;
use App\Table;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    public function home()
    {
        $home = 1;
        $op = Option::first();
        $slides = Slide::where('restaurant_id', 1)->with('category')->get();
        $op->main = str_replace('../', '', $op->main);
        $op->main = str_replace('width="', 'class="img-fluid"', $op->main);
        $op->main = str_replace('height="', '', $op->main);
        return view('home', compact('op', 'home', 'slides'));
    }

    public function benefits()
    {
        $benefits = Option::all()[1];
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        return view('benefits', compact('benefits'));
    }

    public function contactUs()
    {
        $contactUs = Option::all()[1];
        $contactUs->main = str_replace('../', '', $contactUs->main);
        $contactUs->main = str_replace('width="', 'class="img-fluid"', $contactUs->main);
        $contactUs->main = str_replace('height="', '', $contactUs->main);
        return view('contact-us', compact('contactUs'));
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        $home = 1;
        $cats = $restaurant->categories;
        $foods = $restaurant->foods()->paginate(6);
        return view('restaurant', compact('cats', 'home', 'foods', 'restaurant'));
    }

    public function showRestaurants()
    {
        return view('restaurants');
    }

    public function showFood(Food $food, $alert = null)
    {
        return view('food', compact('food', 'alert'));
    }

    public function game(Game $game)
    {
        $dynamic = Banner::randomDynamicBanner()->first(); // start the game banner
        $zirnevis = Banner::randomTextBanner()->first(); // zirnevis
        $banners = Banner::randomNormalBanner()->get(); // upp and down banners
        $urls = ["1" => asset($game->file . '/part1/index.html')];
        $part = 1;

        if (auth()->check()) {
            $user = auth()->user();
            $part = $user->buycodesWith($game)->count() + 1;
        }

        for ($i = 2; $i <= $part; $i++) {
            $urls[$i] = asset($game->file . '/part' . $i . '/index.html');
        }
        return view('game', compact('dynamic', 'urls', 'zirnevis', 'banners', 'part', 'game'));
    }

    public function gamesPage()
    {
        $games = Game::where('status', 1)->paginate(6);
        return view('gamesPage', compact('games'));
    }

    public function checkBuycode(Request $request)
    {
        auth()->loginUsingId(1);
        dd(auth()->user());
        $code = $request->buy_code;
        $buycode = Buycode::where('code', $code)->first();
        $user = User::find(1);
        if ($buycode->user_id == $user->id) {
            $buycode->game_id = $request->id;
            $buycode->save();
        }
        return back();
    }

    public function ajax(Request $request)
    {
        /**
         * @var LengthAwarePaginator $foods
         */
        $foods = (Category::find($request->id))->foods;
        $foods->map(function ($item) {
            $item->url = url('food/' . $item->id);
            $item->img = asset('upload/' . $item->img);
        });
        echo $foods->toJson();
    }

    public function order()
    {
        $home = 1;
        $res = Restaurant::where('id', 1)->with('foods')->get()->first();
        $products = $res->foods;
        $slides = $res->slides()->with('category')->get();
        $special = $res->events();
        return view('order', compact('special', 'slides', 'home', 'products', 'res'));
    }

    public function reserve($id = 1, Request $request)
    {
        $message = isset($request->message) ? $request->message : null;
        $home = 1;
        $miz = Table::where('restaurant_id', $id)->get();
        $reserve = Reserve::where('restaurant_id', $id)->get();
        $out = $miz;
//        foreach ($reserve as $r)
//            if($r->time_e < time())
//                $r->delete();

        $errors = (isset($request->errors)) ? unserialize($reserve->errors) : [];

        return view('reserve', compact('errors', 'home', 'id', 'out', 'message'));
    }

    public function addReserve($id = 1, Request $request)
    {

        $request->time_s = $this->faTOen($request->time_s);
        $date = explode('-', $request->time_s);
        $time = explode(':', substr($date[2], '3'));
        $date[2] = substr($date[2], '0', '2');
        $time_s = new Jalalian($date[0], $date[1], $date[2], $time[0], $time[1]);
        $time_e = new Jalalian($date[0], $date[1], $date[2], (int)$time[0] + (int)$request->time_e, $time[1]);

        $reserve = new Reserve;
        $reserve->name = $request->name;
        $reserve->end_time = $time_e;
        $reserve->start_time = $time_s;
        $reserve->phone = $request->phone;
        $reserve->detail = $request->detail;
        $reserve->tables = rtrim($request->capacity, '-');
        $reserve->restaurant_id = $request->res;

        $message = null;
        if ($this->checkTime($reserve, $id)) {
            if ($reserve->save())
                $message = "میز با موفقیت رزرو شد";
            else {
                $message = "متاسفانه مشکلی در رزرو میز به وجود آمده است";
//                $errors = $reserve->errors->firstOfAll();
//                $errors = serialize($errors);
            }
        } else {
            $message = "متاسفانه میز انتخابی ، در زمان مورد نظر رزرو شده است.";
        }
        $home = 1;
        return redirect(url('reserve/' . $id . '?message=') . $message/*.' & errors='.$errors*/);
    }

    function faTOen($string)
    {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }

    public function checkTime(Reserve $reserve, $id)
    {
        $old = Reserve::where('restaurant_id', $id)->get();
        foreach ($old as $m) {
            if (array_intersect(explode('-', $m->tables), explode('-', $reserve->tables))) {
                if ($reserve->time_e > $m->time_s && $reserve->time_s < $m->time_e)
                    return false;
            }
        }
        return true;
    }

    public function loginPage()
    {
        if (\Auth::check())
            return back();
        return view('user.login');
    }

    public function login(Request $request)
    {
        return User::login($request->username, $request->password);
    }

    public function logout()
    {
        if (\Auth::check())
            \Auth::logoutCurrentDevice();
        return redirect('/');
    }

}
