<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['layout'] = 'admin.main';
        $this->data['isAdmin'] = true;

        // $user = User::where('is_admin',1)->orderBy('created_at','DESC')->get();
        return view('homeMain', $this->data);
    }

    public function store(){

        return 'Admin';
    }

    public function donhangnhap(){
        $this->data['layout'] = 'admin.donhangnhap';
        $this->data['isAdmin'] = true;

        return view('homeMain', $this->data);
    }

    public function donhangxuat(){
        $this->data['layout'] = 'admin.donhangxuat';
        $this->data['isAdmin'] = true;

        return view('homeMain', $this->data);
    }

    public function thongke(){
        $this->data['layout'] = 'admin.thongke';
        $this->data['isAdmin'] = true;

        return view('homeMain', $this->data);
    }
}
