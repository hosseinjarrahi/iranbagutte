<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Buycode;
use App\Category;
use App\Cyberspace;
use App\Food;
use App\Game;
use App\Option;
use App\Reserve;
use App\Restaurant;
use App\Slide;
use App\Table;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    public function home()
    {
        $games = Game::inRandomOrder()->where('special', 1)->limit(2)->get();
        $home = 1;
        $op = Option::first();
        $slides = Slide::where('restaurant_id', 1)->with('category')->get();
        $op->main = str_replace('../', '', $op->main);
        $op->main = str_replace('width="', 'class="img-fluid"', $op->main);
        $op->main = str_replace('height="', '', $op->main);
        $cyberspace = Cyberspace::get();
        $restaurants = Restaurant::get();
        return view('home', compact('op', 'home', 'slides', 'games', 'cyberspace', 'restaurants'));
    }

    public function benefits()
    {
        $benefits = Option::first() ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('benefits', compact('benefits', 'cyberspace'));
    }

    public function contactUs()
    {
        $contactUs = Option::find(2) ?? new Option();
        $contactUs->main = str_replace('../', '', $contactUs->main);
        $contactUs->main = str_replace('width="', 'class="img-fluid"', $contactUs->main);
        $contactUs->main = str_replace('height="', '', $contactUs->main);
        $cyberspace = Cyberspace::get();
        return view('contact-us', compact('contactUs', 'cyberspace'));
    }

    public function delivery()
    {
        $delivery = Option::find(4) ?? new Option();
        $delivery->main = str_replace('../', '', $delivery->main);
        $delivery->main = str_replace('width="', 'class="img-fluid"', $delivery->main);
        $delivery->main = str_replace('height="', '', $delivery->main);
        $cyberspace = Cyberspace::get();
        return view('delivery', compact('delivery', 'cyberspace'));
    }

    public function call()
    {
        $call = Option::find(3) ?? new Option();
        $call->main = str_replace('../', '', $call->main);
        $call->main = str_replace('width="', 'class="img-fluid"', $call->main);
        $call->main = str_replace('height="', '', $call->main);
        $cyberspace = Cyberspace::get();
        return view('call', compact('call', 'cyberspace'));
    }

    public function collaborateWithFastFoodMaker()
    {
        $collaborateWithFastFoodMaker = Option::all()[1];
        $collaborateWithFastFoodMaker->main = str_replace('../', '', $collaborateWithFastFoodMaker->main);
        $collaborateWithFastFoodMaker->main = str_replace('width="', 'class="img-fluid"', $collaborateWithFastFoodMaker->main);
        $collaborateWithFastFoodMaker->main = str_replace('height="', '', $collaborateWithFastFoodMaker->main);
        $cyberspace = Cyberspace::get();
        return view('collaborate-with-fastFood-maker', compact('collaborateWithFastFoodMaker', 'cyberspace'));
//        return view('collaborate-with-fastFood-maker');
    }

    public function collaborateWithGameDevelopers()
    {
        $collaborateWithGameDevelopers = Option::all()[1];
        $collaborateWithGameDevelopers->main = str_replace('../', '', $collaborateWithGameDevelopers->main);
        $collaborateWithGameDevelopers->main = str_replace('width="', 'class="img-fluid"', $collaborateWithGameDevelopers->main);
        $collaborateWithGameDevelopers->main = str_replace('height="', '', $collaborateWithGameDevelopers->main);
        $cyberspace = Cyberspace::get();
        return view('collaborate-with-game-developers', compact('collaborateWithGameDevelopers', 'cyberspace'));
//        return view('collaborate-with-game-developers');
    }


    public function makeGameForUs()
    {
        $makeGameForUs = Option::all()[1];
        $makeGameForUs->main = str_replace('../', '', $makeGameForUs->main);
        $makeGameForUs->main = str_replace('width="', 'class="img-fluid"', $makeGameForUs->main);
        $makeGameForUs->main = str_replace('height="', '', $makeGameForUs->main);
        $cyberspace = Cyberspace::get();
        return view('make-game-for-us', compact('makeGameForUs', 'cyberspace'));
    }

    public function howToOrder()
    {
        $howToOrder = Option::all()[1];
        $howToOrder->main = str_replace('../', '', $howToOrder->main);
        $howToOrder->main = str_replace('width="', 'class="img-fluid"', $howToOrder->main);
        $howToOrder->main = str_replace('height="', '', $howToOrder->main);
        $cyberspace = Cyberspace::get();
        return view('how-to-order', compact('howToOrder', 'cyberspace'));
    }


    public function showRestaurant(Restaurant $restaurant)
    {
        $cats = $restaurant->categories;
        $foods = $restaurant->foods()->paginate(6);
        $cyberspace = Cyberspace::get();

        return view('restaurant', compact('cats', 'foods', 'restaurant', 'cyberspace'));
    }

    public function showRestaurants()
    {
        $restaurants = Restaurant::paginate(20);
        $cyberspace = Cyberspace::get();

        return view('restaurants', compact('restaurants', 'cyberspace'));
    }

    public function showFood(Food $food, $alert = null)
    {
        $cyberspace = Cyberspace::get();
        return view('food', compact('food', 'alert', 'cyberspace'));
    }

    public function game(Game $game)
    {
        $comments = $game->comment()->where('status', 1)->where('role', 1)->get(); // comments
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
        $cyberspace = Cyberspace::get();
        return view('game', compact('dynamic', 'urls', 'zirnevis', 'banners', 'part', 'game', 'comments', 'cyberspace'));
    }

    public function gameDetails(Game $game)
    {
        $cyberspace = Cyberspace::get();
        return view('front.game.gameDetails', compact('game', 'cyberspace'));
    }

    public function gamesPage()
    {
        $games = Game::where('status', 1)->paginate(6);
        $cyberspace = Cyberspace::get();
        return view('gamesPage', compact('games', 'cyberspace'));
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

    public function order(Request $request)
    {
        $home = 1;
        $res = Restaurant::where('id', 1)->first();
        $products = (Category::find($request->id))->foods;
        $slides = $res->slides()->with('category')->get();
        $special = $res->events();


        $comments = $res->comment()->where('status', 1)->where('role', '2')->get(); // comments
        $cyberspace = Cyberspace::get();
        return view('order', compact('special', 'slides', 'home', 'products', 'res', 'comments', 'cyberspace'));
    }

    public function reserve($id = 1, Request $request)
    {
        $message = isset($request->message) ? $request->message : null;
        $home = 1;
        $miz = Table::where('restaurant_id', $id)->get();
        $reserve = Reserve::where('restaurant_id', $id)->get();
        $out = $miz;

        $errors = (isset($request->errors)) ? unserialize($reserve->errors) : [];
        $cyberspace = Cyberspace::get();
        return view('reserve', compact('errors', 'home', 'id', 'out', 'message', 'cyberspace'));
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
        $tables = explode('-', $request->capacity);
        array_pop($tables);
        $reserve->tables = $tables;
        $reserve->restaurant_id = $request->res;

        $message = null;
        if ($this->checkTime($reserve, $id)) {
            if ($reserve->save()) {
                $message = "میز با موفقیت رزرو شد";
            } else {
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
        return strtr($string, [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
        ]);
    }

    public function checkTime(Reserve $reserve, $id)
    {
        /**
         * @var  \Illuminate\Support\Collection $tables
         * @var  \Illuminate\Support\Collection $conflicts
         */
        $restaurant = Restaurant::find($id);
        $tables = $restaurant->tables->pluck('id');
        $conflicts = $restaurant->reserves()->where('end_time', '>', $reserve->start_time)->where('start_time', '<', $reserve->end_time)->get();
        $reservedTables = ($conflicts->pluck('tables'))->flatten(4);
        foreach ($reservedTables as $key => $reservedTable) {
            $index = $tables->search($reservedTable);
            if ($index !== false) {
                $tables->forget($index);
            }
        }

        return $reserve->tables->diff($tables)->isEmpty();
    }

    public function loginPage()
    {
        if (\Auth::check()) {
            return back();
        }

        return view('user.login');
    }

    public function login(Request $request)
    {
        return User::login($request->username, $request->password);
    }

    public function logout()
    {
        if (\Auth::check()) {
            \Auth::logoutCurrentDevice();
        }

        return redirect('/');
    }
}
