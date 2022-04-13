<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Banner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $banners = Banner::take(5)->get();
        $categories = Category::take(12)->get(); //->lates() cara lain ambildata
        $products = Product::with(['galleries'])->take(8)->get();    
        return view('pages.home', [
            // 'banners' => $banners,
            'categories' => $categories,
            'products' => $products
        ]);
    }    
}
