<?php

namespace App\Http\Controllers;
use App\Blacklist;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blacklists = Blacklist::orderby('created_at', 'desc')->skip(0)->take(10)->get();
        $dateVal = [];
        $userVal = [];
        $blackVal = [];
        $totalUser = User::get()->count();
        $totalBlacklist = Blacklist::get()->count();

        for($i = 0 ; $i < 8 ; $i++) 
        {
            $dateVal[] = date('Y-m-d',strtotime("-" . (6-$i) . " months"));
            $userVal[] = User::where('created_at', "<=", $dateVal[$i])->get()->count();
            $blackVal[] = Blacklist::where('created_at', "<=", $dateVal[$i])->get()->count();
            $dateVal[$i] = date('Y-m',strtotime("-" . (6-$i) . " months"));
        }
        
        foreach($blacklists as $blacklist) {
            $blacklist->content = substr($blacklist->content,0,200) . (strlen($blacklist->content) > 200 ? "..." : "");
        }
        return view('dashboard', compact(['blacklists', 'dateVal', 'userVal', 'blackVal', 'totalUser', 'totalBlacklist']));
    }
}
