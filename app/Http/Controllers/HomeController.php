<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
// use Cart;

class HomeController extends Controller
{
    public $data = [];
    
    public function __construct(){
        $this->data['isAdmin'] = false;
        $this->data['cats'] = Category::all();
        $this->data['products'] = Product::all();
    }

    public function index(){
        $this->data['layout'] = 'clients.main';

        return view('homeMain', $this->data);
    }

    public function contact(){
        $this->data['layout'] = 'clients.contact';

        return view('homeMain', $this->data);
    }

    public function cart(){
        $this->data['layout'] = 'clients.cart';

        return view('homeMain', $this->data);
    }
}
