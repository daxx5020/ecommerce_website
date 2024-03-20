<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\heroPageSection;

class DemoController extends Controller
{
    Public function index(){
    $data = heroPageSection::all();
    return view('users.home',compact('data'));
    }
}
