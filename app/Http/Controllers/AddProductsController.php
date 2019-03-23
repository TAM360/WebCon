<?php

namespace App\Http\Controllers;

Use App\CompanyProduct;
Use App\Company;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Cloudder;

class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addItem');
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
}
