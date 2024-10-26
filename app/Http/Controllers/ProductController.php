<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $data = [];
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        return view('users.product',compact('data'));
    }

    
}
