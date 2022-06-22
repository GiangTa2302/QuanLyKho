<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $data = [];

    public function __construct(){
        $cats = Category::all();
        
        session()->put('cats',$cats);
        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cate'] = Category::all();
    }

    public function index(){
        $this->data['layout'] = 'clients.checkout';
        $this->data['isAdmin'] = false;

        $cart = session()->get('cart');

        if(!isset($cart)){
            return redirect()->back()->with('success', 'Chưa có đơn hàng nào trong giỏ!');
        }
        else{
            session()->put('cart',$cart);

            return view('homeMain', $this->data);
        }
    }

    public function placeorder(Request $request){
        $cart = session()->get('cart'); 
        $id = $request->input('user_id');

        $order = new Order();
        $order->user_id = $id;
        $order->name = $request->input('name');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->province = $request->input('province');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->note = $request->input('note');
        $order->typeOrder = $request->input('typeOrder');
        $order->save();

        foreach($cart as $item)
        {
            OrderItem::create([
                'pro_id' => $item['pro_id'],
                'order_id' => $order->id,
                'price' => $item['price'],
                'quantity' => $item['qty'],
            ]);

            $order->total += $item['price'] * $item['qty'];
        }
        Order::where('id', $order->id)->update(['total'=> $order->total]);
        session()->forget('cart', $cart);
        
        return redirect()->route('user.myAccount',['id'=>$id])->with('success', 'Đặt hàng thành công!');
    }

    public function donnhap(){
        $this->data['layout'] = 'admin.donnhap';
        $this->data['isAdmin'] = true;

        $orders = Order::where('typeOrder','nhap')->where('is_check',NULL)->get();

        return view('homeMain', $this->data, compact('orders'));
    }

    public function donxuat(){
        $this->data['layout'] = 'admin.donxuat';
        $this->data['isAdmin'] = true;

        $orders = Order::where('typeOrder','xuat')->where('is_check',NULL)->get();

        return view('homeMain', $this->data, compact('orders'));
    }

    public function xacnhan($id, $role){
        // $user = User::find($role)->first();

        Order::where('id', $id)->update(['is_check'=> 1, 'tenNVK' => $role]);

        $order_items = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT','typeOrder', 'products.quantity AS qty')
            ->where('order_id','=',$id)
            ->get();
        
        foreach ($order_items as $key => $value) {
            if($value->typeOrder == "nhap")
            {
                $sum = $value->qty + $value->quantity;
                Product::where('id',$value->pro_id)->update(['quantity' => $sum]);
            } else{
                $sum = $value->qty - $value->quantity;
                Product::where('id',$value->pro_id)->update(['quantity' => $sum]);
            }
        }
        return redirect()->back()->with('success', 'Xác nhận đơn hàng thành công!');
    }

    public function huy($id, $role){
        // $user = User::find($role)->first();
        Order::where('id', $id)->update(['is_check' => 0, 'tenNVK' => $role]);

        return redirect()->back()->with('success', 'Hủy đơn hàng thành công!');
    }

    public function donhangxuat(){
        $this->data['layout'] = 'admin.donhangxuat';
        $this->data['isAdmin'] = true;

        $orders = Order::where('typeOrder','xuat')->where('is_check',1)->get();
        $destroy = Order::where('typeOrder','xuat')->where('is_check',0)->get();

        $order_items = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT')
            ->where('typeOrder','=','xuat')
            ->where('is_check','=',1)
            ->get();

        $order_destroy = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT')
            ->where('typeOrder','=','xuat')
            ->where('is_check','=',0)
            ->get();

        return view('homeMain', $this->data, compact('orders','order_items','destroy','order_destroy'));
    }

    public function donhangnhap(){
        $this->data['layout'] = 'admin.donhangnhap';
        $this->data['isAdmin'] = true;

        $orders = Order::where('typeOrder','nhap')->where('is_check',1)->get();
        $destroy = Order::where('typeOrder','nhap')->where('is_check',0)->get();

        $order_items = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT')
            ->where('typeOrder','=','nhap')
            ->where('is_check','=',1)
            ->get();

        $order_destroy = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.pro_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->select('order_items.*', 'products.tenSP', 'products.DVT')
            ->where('typeOrder','=','nhap')
            ->where('is_check','=',0)
            ->get();

        return view('homeMain', $this->data, compact('orders','order_items','destroy','order_destroy'));
    }
}
