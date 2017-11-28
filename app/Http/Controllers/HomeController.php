<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
            ->orderBy('adverts.created_at', 'desc')
            ->get();
        return view('welcome')->with(['adverts' => $adverts]);
    }
}
