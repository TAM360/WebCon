<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyProduct;

use Log;

class SearchProductsController extends Controller
{
    public function index() {
        $products = CompanyProduct::take(20)->get();
        return view('search')->with('products', $products);
    }

    public function searchByFilter(Request $request) {

        // dd($request->request);
        if ($request->category != NULL) 
        {
            $products = CompanyProduct::where('category', $request->category)->get();
        }
        
        else if ($request->min != NULL && $request->max != NULL)
        {
            $products = CompanyProduct::whereBetween('price', [$request->min , $request->max])->get();
        }
        
        else 
        {
            $products = CompanyProduct::take(20)->get();
        }
        // return $products;
        // dd($products);
        return redirect()->to('search')->with('products', $products);
    }

    public function algolia()
    {
        return view('algolia');
    }

    public function searchByAlgolia(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // try 
        // {
            if ($request->has('q'))
            {
                $products = CompanyProduct::search($request->q)->get();
                // $products = CompanyProduct::where('category', $request->q)->get();
                return $products;
            }

            return $error;
        // }
        // catch (\GuzzleHttp\Exception\ConnectException $e) {
        //     // log the error here
    
        //     Log::Warning('guzzle_connect_exception', [
        //             'url' => $request->fullUrl(),
        //             'message' => $e->getMessage()
        //     ]);
            
        // } 
        // catch (\GuzzleHttp\Exception\RequestException $e) {
    
        //     Log::Warning('guzzle_connection_timeout', [
        //             'url' => $request->fullUrl(),
        //             'message' => $e->getMessage()
        //     ]);
        // }
    }
}
