<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = DB::table('products')
            ->select('adverts.id', 'adverts.title', 'products.brand', 'products.p_cost', 'products.c_cost', 'images.img_name')
            ->join('adverts', 'adverts.id', '=', 'products.advert_id')
            ->join('images', 'adverts.id', '=', 'images.advert_id')
            ->get();
        return view('home')->with(['adverts' => $adverts]);
    }
}
