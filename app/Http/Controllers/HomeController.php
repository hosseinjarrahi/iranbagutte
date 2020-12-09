<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Buycode;
use App\Category;
use App\Cyberspace;
use App\Event;
use App\Food;
use App\Game;
use App\Option;
use App\Payment;
use App\Reserve;
use App\Restaurant;
use App\Slide;
use App\Table;
use App\TableInfo;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    public function home()
    {
        $event = Event::all()->first();
        if (isset($event->id)) {
            $game_event = Game::find($event->game_id);
        } else {
            $game_event = NULL;
        }
        $games = Game::inRandomOrder()->where('special', 1)->limit(2)->get();
        $home = 1;
        $op = Option::first();
        $slides = Slide::where('restaurant_id', 1)->with('category')->get();
        $op->main = str_replace('../', '', $op->main);
        $op->main = str_replace('width="', 'class="img-fluid"', $op->main);
        $op->main = str_replace('height="', '', $op->main);
        $cyberspace = Cyberspace::get();
        $restaurants = Restaurant::get();
        return view('home', compact('event', 'game_event', 'op', 'home', 'slides', 'games', 'cyberspace', 'restaurants'));
    }

    public function benefits()
    {
        $benefits = Option::find(2) ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('benefits', compact('benefits', 'cyberspace'));
    }

    public function contactUs()
    {
        $contactUs = Option::find(5) ?? new Option();
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
        $event = Event::all()->first();
        if (isset($event->id)) {
            $game_event = Game::find($event->game_id);
        } else {
            $game_event = NULL;
        }
        return view('delivery', compact('event', 'game_event', 'delivery', 'cyberspace'));
    }

    public function call()
    {
        $call = Option::find(3) ?? new Option();
        $call->main = str_replace('../', '', $call->main);
        $call->main = str_replace('width="', 'class="img-fluid"', $call->main);
        $call->main = str_replace('height="', '', $call->main);
        $cyberspace = Cyberspace::get();
        $event = Event::all()->first();
        if (isset($event->id)) {
            $game_event = Game::find($event->game_id);
        } else {
            $game_event = NULL;
        }
        return view('call', compact('event', 'game_event', 'call', 'cyberspace'));
    }

    public function collaborateWithFastFoodMaker()
    {
        $benefits = Option::find(8) ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('collaborate-with-fastFood-maker', compact('benefits', 'cyberspace'));
    }

    public function collaborateWithGameDevelopers()
    {
        $benefits = Option::find(6) ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('collaborate-with-game-developers', compact('benefits', 'cyberspace'));
    }


    public function makeGameForUs()
    {
        $benefits = Option::find(7) ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('make-game-for-us', compact('benefits', 'cyberspace'));
    }

    public function howToOrder()
    {
        $benefits = Option::find(11) ?? new Option();
        $benefits->main = str_replace('../', '', $benefits->main);
        $benefits->main = str_replace('width="', 'class="img-fluid"', $benefits->main);
        $benefits->main = str_replace('height="', '', $benefits->main);
        $cyberspace = Cyberspace::get();
        return view('how-to-order', compact('benefits', 'cyberspace'));
    }


    public function showRestaurant(Restaurant $restaurant)
    {
        $cats = $restaurant->categories;
        $foods = $restaurant->foods()->paginate(6);
        $cyberspace = Cyberspace::get();
        $home = 1;

        return view('restaurant', compact('cats', 'foods', 'restaurant', 'cyberspace', 'home'));
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

    public function payGame(Game $game)
    {
        if (!auth()->check()) return redirect('/login');

        $user = auth()->user();

        if ($game->price <= 0) {
            $pay = new Payment();
            $pay->user_id = $user->id;
            $pay->trans_id = 0;
            $pay->restaurant_id = 0;
            $pay->products = $game->id;
            $pay->save();
            $message = " خرید انجام شد";
            return view('user.complete', compact('message'));
        }

        if ($user->address == null || $user->phone == null) {
            return redirect('/edit');
        }

        session(['game-price' => $game->price]);
        session(['game-id' => $game->id]);

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc'; //Required
        $Amount = $game->price; //Amount will be based on Toman - Required
        $Description = 'خرید از ایران باگت'; // Required
        $CallbackURL = route('pay.game.callback'); // Required


        $client = new \SoapClient('https://zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'CallbackURL' => $CallbackURL,
            ]
        );

        if ($result->Status == 100) {
            return redirect('https://zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }

    }

    public function payGameCallback(Request $request)
    {
        if (!auth()->check()) return redirect('/login');

        $user = auth()->user();

        $MerchantID = '6468a85e-fb2b-11ea-be55-000c295eb8fc';
        $Amount = session('game-price'); //Amount will be based on Toman
        $Authority = $request->Authority;

        if ($request->Status == 'OK') {

            $client = new \SoapClient('https://zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

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
                $pay->products = session('game-id');
                $pay->save();
                $message = 'محصول با موفقیت خرید شد.';
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

    public function gamesPage()
    {
        $games = Game::where('status', 1)->paginate(6);
        $cyberspace = Cyberspace::get();
        return view('gamesPage', compact('games', 'cyberspace'));
    }

    public function checkBuycode(Request $request)
    {
        $code = $request->buy_code;
        $buycode = Buycode::where('code', $code)->first();
        $user = auth()->user();
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
        $event = Event::all()->first();
        if (isset($event->id)) {
            $game_event = Game::find($event->game_id);
        } else {
            $game_event = NULL;
        }

        $comments = $res->comment()->where('status', 1)->where('role', '2')->get(); // comments
        $cyberspace = Cyberspace::get();
        return view('order', compact('event', 'game_event', 'special', 'slides', 'home', 'products', 'res', 'comments', 'cyberspace'));
    }

    public function reserve($id, Request $request)
    {
        $message = isset($request->message) ? $request->message : null;
        $home = 1;
        $miz = Table::where('restaurant_id', $id)->get();
        $reserve = Reserve::where('restaurant_id', $id)->get();
        $out = $miz;

        $errors = (isset($request->errors)) ? unserialize($reserve->errors) : [];
        $cyberspace = Cyberspace::get();
        $tableInfo = TableInfo::where('restaurant_id', $id)->get();

        $event = Event::all()->first();
        if (isset($event->id)) {
            $game_event = Game::find($event->game_id);
        } else {
            $game_event = NULL;
        }

        return view('reserve', compact('game_event', 'event', 'errors', 'home', 'id', 'out', 'message', 'cyberspace', 'tableInfo'));
    }

    public function addReserve($id = 1, Request $request)
    {
//        $temp_zarinpal = "https://zarinp.al/@iranbaguette";
//        return redirect($temp_zarinpal);
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
        session()->forget('isAdmin');
        if (\Auth::check()) {
            \Auth::logoutCurrentDevice();
        }

        return redirect('/');
    }

    public function checkCodePage()
    {
        return view('user.checkBuycode', ['first' => true]);
    }

    public function checkCode(Request $request)
    {
        $code = $request->code;
        $code = Buycode::where(['code' => $code, 'get' => false, 'user_id' => auth()->id()])->with(['product' => function ($query) {
            $query->with('restaurant');
        }, 'game'])->first();
        if (!$code) {
            return view('user.checkBuycode', ['message' => 'چنین کدی وجود ندارد و یا قبلا استفاده شده است.']);
        }

        return view('user.checkBuycode', compact('code'));
    }

    public function getCode(Request $request)
    {
        $data = $request->only(['event', 'game']);
    }

    public function gift(Request $request)
    {
        if ($request->event) {
            $events = Event::with(['buycodes' => function ($query) {
                $query->whereNull('user_id');
            }])->get();
            $choice = $events[0] ?? false;
            if ($choice) {
                if ($choice->game_id) {
                    $pay = new Payment();
                    $pay->user_id = auth()->id();
                    $pay->trans_id = 0;
                    $pay->restaurant_id = 0;
                    $pay->products = $choice->game_id;
                    $pay->save();
                    $choice->delete();
                    return response(['message' => 'تبریک! شما بازی ' . $choice->game->name . ' را برنده شدید. ']);
                } else if ($choice->product_id) {
                    $choice->user_id = auth()->id();
                    $choice->save();
                    return response(['message' => 'کد تخفیف خرید محصول برای شما ثبت شد از پنل خود آن را مشاهده کنید.']);
                }
            }
        } else {
            $buycodes = Buycode::whereNull('user_id')->whereNull('event_id')->get();
            $choice = $buycodes[0] ?? false;
            if ($choice) {
                $choice->user_id = auth()->id();
                $choice->save();
                return response(['message' => 'کد تخفیف خرید محصول برای شما ثبت شد از پنل خود آن را مشاهده کنید.']);
            }
        }

        return response(['message' => 'متاسفانه کدی هدیه ای وجود ندارد.:(']);
    }

    public function buycodes(){
        $buycodes = auth()->user()->buycodes()->where('get',0)->get();
        return view('user.buycodes',compact('buycodes'));
    }

}
