<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/home');
    }


    public function changeLanguage($lang = null){

        if(!empty($lang)) {
            session(['lang' => $lang]);
            return redirect()->back();
        }

        if(session('lang', 'hu') == 'hu') {
            session(['lang' => 'en']);
        }else{
            session(['lang' => 'hu']);
        }

        return redirect()->back();

    }

}
