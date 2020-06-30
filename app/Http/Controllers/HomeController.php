<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function storeOrder(Request $request){
       
        $order = new Pesan();
        $order->nama_homestay = $request->nama_homestay;
        $order->harga = $request->harga;

        return redirect('/landing-page');
    }

}
