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
        // return $request;
        // if ($request->cement) {
        //     $products = CompanyProduct::where('category', $request->cement)->get();
        // } else if ($request->paint) {
        //     $products = CompanyProduct::where('category', $request->paint)->get();
        // } else if ($request->tiles) {
        //     $products = CompanyProduct::where('category', $request->tiles)->get();
        // } else if ($request->polymer) {
        //     $products = CompanyProduct::where('category', $request->polymer)->get();
        // } else {
        //     $products = CompanyProduct::take(20)->get();
        // }

        if ($request->category) {
            $products = CompanyProduct::where('category', $request->category)->get();
        } else {
            $products = CompanyProduct::take(20)->get();
        }
        return view('search')->with('products', $products);
    }
}
