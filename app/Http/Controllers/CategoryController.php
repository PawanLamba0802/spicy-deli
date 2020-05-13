<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //need to put thi later in helper class
    public $successStatus = 200;
    public $successCreatedStatus = 201;
    public $successNoContentStatus = 204;
    public $BadRequestStatus = 400;
    public $unauthorizedStatus = 401;
    public $NotFoundStatus = 404;
    
    public function index()
    {
        //list everything
        $category = Category::all(); 
        return response()->json(['success' => $category], $this-> successStatus);
    }

    public function show($id)
    {
        //list as per the id
        $category = Category::find($id);
        return response()->json(['success' => $category], $this-> successStatus);
    }
}
