<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //need to put thi later in helper class
    public $successStatus = 200;
    public $successCreatedStatus = 201;
    public $successNoContentStatus = 204;
    public $BadRequestStatus = 400;
    public $unauthorizedStatus = 401;
    public $NotFoundStatus = 404;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list everything
        $product = Product::all(); 
        return response()->json(['success' => $product], $this-> successStatus);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //validation 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'user_id' => 'required', 
            'category_id' => 'required', 
            'SKU' => 'required', 
            'price' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], $this-> BadRequestStatus);            
        }

        //saving to db
        $product = new Product();

        $product->name = $request->name;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->SKU = $request->SKU;
        $product->price = $request->price;
        

        $product->save();

        return response()->json(['success'=>$product], $this-> successCreatedStatus);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //list as per the id
        $product = Product::find($id);
        return response()->json(['success' => $product], $this-> successStatus);
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
        //validation 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'user_id' => 'required', 
            'category_id' => 'required', 
            'SKU' => 'required', 
            'price' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], $this-> BadRequestStatus);            
        }

        //update to db
        $product = Product::find($id);

        $product->name = $request->name;
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->SKU = $request->SKU;
        $product->price = $request->price;
        

        $product->save();

        return response()->json(['success'=>$product], $this-> successStatus);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete from db
        $product = Product::find($id);

        $product->delete();
        return response()->json(['success'=>$product], $this-> successNoContentStatus);  

    }
}
