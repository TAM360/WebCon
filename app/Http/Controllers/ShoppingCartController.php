<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Cartalyst\Stripe\Stripe;
use App\UserTransaction;

use App\User;
use Auth;
use PHPUnit\Framework\Constraint\Exception;
use Log;
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
        if (Auth::check()) {
            if (Auth::user()->identifier) {
                Cart::instance(Auth::user()->identifier)->add([
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
                Cart::instance($identifier)->add([
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
        } else {
            return ['success_message' => 'login before adding items to carts.'];
        }
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

    public function removeItem()
    {
        Cart::instance(Auth::user()->identifier)->remove(request()->rowId);
        return redirect('/cart')->with(['success_message' => 'item has been removed from cart!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance($id)->destroy();
        User::where('id', Auth::user()->id)->update(['identifier' => ""]);
        return ['success_message' => 'cart session has been emptied.'];
    }

    public function checkout() {
        return view('shopping-cart')->with([
            'cart_items' => Cart::instance(Auth::user()->identifier)->content(),
            'total_count' => Cart::instance(Auth::user()->identifier)->count(),
            'total_price' => Cart::instance(Auth::user()->identifier)->total(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ]);
    }

    public function onlinePayment(Request $request) {
        // try {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            $stripe->charges()->create([
                'currency' => 'PKR',
                'amount'   => $request->total_price,
                'receipt_email' => $request->email,
                'source' => $request->stripeToken
            ]);
            UserTransaction::create([
                'user_id' => Auth::user()->id,
                'items' => 'sample item',
                'total_amount' => $request->total_price,
                'total_items' => $request->total_count,
                'stripe_token' => $request->stripeToken
            ]);
            return redirect('/search')->with(['success_message' => 'Your transaction has been completed']);
        // } 
        // catch (Exception $e) {
        //      Log::Warning('exception within shopping cart controller', [
        //             'url' => $request->fullUrl(),
        //             'message' => $e->getMessage()
        //     ]);
        //     return redirect('checkout')->with(['error_message' => $e->getMessage()]);
        // }
        
    }
       
}
