<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Total;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cate'] = Category::all();
    }

    public function index(){
        
        $this->data['layout'] = 'admin.main';
        $this->data['isAdmin'] = true;
        $month = date('m');
        $year = date('Y');
        if($month == 1){
            $day1 = $year.'-'.$month.'-01 00:00:00';
            $day2 = ($year-1).'-12-01 00:00:00';
            $day1 = date('Y-m-d H:i:s', strtotime($day1));
            $day2 = date('Y-m-d H:i:s', strtotime($day2));
        }
        else{
            $day1 = $year.'-'.$month.'-01 00:00:00';
            $day2 = $year.'-'.($month-1).'-01 00:00:00';
            $day1 = date('Y-m-d H:i:s', strtotime($day1));
            $day2 = date('Y-m-d H:i:s', strtotime($day2));
        }

        $order_items = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT','typeOrder','giaNhap','giaXuat')
            ->whereBetween('orders.updated_at',[$day2, $day1])
            ->get();

        $newProduct = DB::table('order_items')
        ->join('products', 'products.id', '=', 'order_items.pro_id')
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->select('order_items.*', 'products.tenSP', 'image', 'giaNhap','orders.name as tenNCC','products.quantity as qty')
        ->where('typeOrder','=','nhap')
        ->take(5)->get();

        // dd($newProduct);
        $tongNhap = 0;
        $tongXuat = 0;

        $doanhThu = 0;
        foreach ($order_items as $key => $value){
            if($value->typeOrder == 'nhap'){
                $tongNhap += $value->quantity;
            }
            else
            {
                $tongXuat += $value->quantity;
                $doanhThu += ($value->giaXuat - $value->giaNhap) * $value->quantity;
            }
        }
        
        if($month == 1){
            $month == 12;
            Total::where('name', $month)->update(['tongX'=>$tongXuat, 'tongN' => $tongNhap,'doanhThu' => $doanhThu]);
            $total = Total::where('name', $month-1)->first();
        } else if($month == 2){
            Total::where('name', $month-1)->update(['tongX'=>$tongXuat, 'tongN' => $tongNhap,'doanhThu' => $doanhThu]);
            $month = 12;
            $total = Total::where('name', $month)->first();
        }
        else{
            Total::where('name', $month-1)->update(['tongX'=>$tongXuat, 'tongN' => $tongNhap,'doanhThu' => $doanhThu]);
            $total = Total::where('name', $month-2)->first();
        }
        $tongX = $total['tongX'];
        $tongN = $total['tongN'];
        $dt = $total['doanhThu'];

        $chart = Total::all();

        return view('homeMain', $this->data, compact('tongNhap', 'tongXuat','tongX', 'tongN', 'chart', 'doanhThu', 'newProduct','dt'));
    }

    public function thongke(){
        $this->data['layout'] = 'admin.thongke';
        $this->data['isAdmin'] = true;

        $chart = Total::all();

        return view('homeMain', $this->data, compact('chart'));
    }

    public function profile($user_id){
        $this->data['layout'] = 'admin.profile';
        $this->data['isAdmin'] = true;

        $user = User::find($user_id);

        return view('homeMain', $this->data, compact('user'));
    }
}
