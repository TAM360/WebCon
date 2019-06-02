<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
Use App\User;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shopping-cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->identifier) {
            Cart::instance(Auth::user()->identifier)::add([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => (double)$request->price,
                'url' => $request->url,
                'qty' => 1
            ])
            ->associate('App\CompanyProduct');
        } else {
            $identifier = Hash::make(Faker::create()->name);
            Cart::instance($identifier)::add([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => (double)$request->price,
                'url' => $request->url,
                'qty' => 1
            ])
            ->associate('App\CompanyProduct');

            User::where('id', Auth::user()->id)->update(['identifier' => $identifier]);

        }
        return ['success_message' => 'item has been added in cart.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkout() {
        redirect('shopping-cart');
    }
}
