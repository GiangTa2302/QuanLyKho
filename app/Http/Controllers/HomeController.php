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
        $products = Product::all();
        $pros = array();
        $i = 0;
        $date = date('Y-m-d');
        foreach ($products as $item) {
            $tgBQ = $item->tgBaoQuan;
            if(strtotime($tgBQ) > strtotime($date)){
                $pros[$i] = $item;
                $i++;
            }
        }
        $this->data['products'] = $pros;

        $products = Product::orderBy('created_at','DESC')
                    ->take(8)->get();
        $pros1 = array();
        $i = 0;
        foreach ($products as $item) {
            $tgBQ = $item->tgBaoQuan;
            if(strtotime($tgBQ) > strtotime($date)){
                $pros1[$i] = $item;
                $i++;
            }
        }
        $this->data['newProduct'] =  $pros1;
        
        $cats = Category::all();
        session()->put('cats',$cats);
    }

    public function index(){
        $this->data['layout'] = 'clients.main';
        
        return view('homeMain', $this->data);
    }

    public function contact(){
        $this->data['layout'] = 'clients.contact';
        
        // dd(session('cats'));
        return view('homeMain', $this->data);
    }

    public function cart(){
        $this->data['layout'] = 'clients.cart';

        return view('homeMain', $this->data);
    }
}
