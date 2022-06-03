<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public $data = [];
    //Lấy ra danh sách các danh mục
    public function index(){

        $cats = Category::all();

        return view('layouts.guest', compact('cats'));
    }

    
}
