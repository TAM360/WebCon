<?php

namespace App\Http\Controllers;

Use App\CompanyProduct;
Use App\Company;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Cloudder;
use Log;

class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->category == "company")
            return view('addItem');
        else 
            return redirect()->route('home');
    }
    
    public function showAllProducts() 
    {
        if (Auth::user()->category == "company") 
        {
            $products = CompanyProduct::where('company_id', Auth::user()->id)->get();
            if ($products->isEmpty()) 
                return redirect()->route('home');
            else
                return view('companyItems', ['products' => $products]);
        } 
        else 
        {
            return redirect()->route('home');
        }
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
        // dd($request->all());
        // TODO: catch cURL error 28 exception.
        if (Auth::user()->category != "company")
            return view('home');

        $error = ['error' => 'error! all field must be filled'];
        $data = $request->all();

        if ($request->has('image_name'))
        {
            $image_name = $request->file('image_name')->getRealPath();;
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            $request->request->add(['image_url' => $image_url]);
            
        }

        $validate = Validator::make($data, [
            'company_id' => ['required', 'integer'],
            'name' => ['require', 'string'],
            'description' => ['required', 'text'],
            'category' => ['required', 'string'],
            'price' => ['required'],
            'image_url' => ['required', 'string'],
        ]);
        
        if ($validate) 
        {
            CompanyProduct::create([
                'company_id' => Auth::user()->id,
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'category' => $request->get('category'),
                'price' => $request->get('price'),
                'image_url' => $request->get('image_url')
            ]);
            return view('home');
        }

        return $error;
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
        if (Auth::user()->category != "company")
            return view('home');
        else 
        {
            
            $input = collect($request->all())->filter(function($value) {
                return null !== $value;
            })->toArray();            

            if (count($input) > 1)
                CompanyProduct::where('id', $id)->update($request->except('_token'));
            return redirect()->route('all_products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            if (Auth::user()->category != "company")
                return view('home');
            else 
                CompanyProduct::destroy($id);
               
        } 
        catch (\GuzzleHttp\Exception\ConnectException $e) 
        {
            // log the error here
    
            Log::Warning('guzzle_connect_exception', [
                    'url' => "/products/destroy/{$id}",
                    'message' => $e->getMessage()
            ]);
            
        }
        finally 
        {
            return redirect()->route('all_products');
        }
    }
}
