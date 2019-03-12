<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyProduct;
use PHPUnit\Framework\Constraint\Exception;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

    public function searchByAlgolia(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        try 
        {
            if ($request->has('q'))
            {
                $products = CompanyProduct::search($request->get('q'))->get();
                return $products->count() ? $products : $error;
            }

            return $error;
        }
        catch (Exception $e)
        {
            
        }
    }
}
