<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Item;
use App\User;


class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();
        return view('myHome', ["users"=>$users]);
    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function myHome()

    {

        return view('myHome');

    }


    /**

     * Show the my users page.

     *

     * @return \Illuminate\Http\Response

     */

    public function myUsers()

    {

        return view('myUsers');

    }

}
