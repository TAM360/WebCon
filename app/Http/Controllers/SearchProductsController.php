<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyProduct;

class SearchProductsController extends Controller
{
    public function index() {
        $products = CompanyProduct::take(20)->get();
        return view('search')->with('products', $products);
    }
    public function searchByFilter(Request $request) {
        if ($request->category) {
            $products = CompanyProduct::where('category', $request->category)->get();
        } else {
            $products = CompanyProduct::take(20)->get();
        }
        return view('search')->with('products', $products);
    }
}
