<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Stripe;

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

        if($request->check == 'th'){
            $request->validate([
                'card_number' => 'required|numeric',
                'expiry_month' => 'required|numeric|between:1,12',
                'expiry_year' => 'required|numeric|min:2022',
                'cvv' => 'required|numeric',
                'name' => 'required',
            ],[
                'card_number.required' => 'Số thẻ bắt buộc phải nhập',
                'card_number.numeric' => 'Số thẻ là số',
                'expiry_month.required' => 'Tháng hết ahjn bắt buộc phải nhập',
                'expiry_month.numeric' => 'Tháng hết hạn là số',
                'expiry_month.between' => 'Tháng hết hạn chưa đúng',
                'expiry_year.required' => 'Năm hết hạn bắt buộc phải nhập',
                'expiry_year.numeric' => 'Năm hết hạn là số',
                'expiry_year.min' => 'Thẻ đã hết hạn',
                'cvv.required' => 'Mã CVV bắt buộc phải nhập',
                'cvv.numeric' => 'Mã CVV chưa đúng',
                'name.required' => 'Họ tên bắt buộc phải nhập',
            ]);

            $stripe = Stripe::make(env('STRIPE_KEY'));
            try{
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->card_number,
                        'exp_month' => $request->expiry_month,
                        'exp_year' => $request->expiry_year,
                        'cvc' =>$request->cvv
                    ]
                ]);

                if(!isset($token['id'])){
                    return redirect()->back()->with('stripe_error','The stripe token was not generated correctly!');
                }

                $customer = $stripe->customers()->create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'VND',
                    'amount' =>$request->total,
                    'description' => 'Hi',
                ]);

                if($charge['status'] == 'succeeded'){
                    $cart = session()->get('cart'); 
                    $id = $request->input('user_id');

                    $order = new Order();
                    $order->user_id = $id;
                    $order->name = $request->input('fullname');
                    $order->country = $request->input('country');
                    $order->city = $request->input('city');
                    $order->province = $request->input('province');
                    $order->address = $request->input('address');
                    $order->phone = $request->input('phone');
                    $order->email = $request->input('email');
                    $order->note = $request->input('note');
                    $order->typeOrder = $request->input('typeOrder');
                    $order->is_payment = 1;
                    $order->save();

                    foreach($cart as $item){
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
                else{
                    return redirect()->back()->with('stripe_error','The stripe token was not generated correctly!');
                }
            } catch(Exception $e){
                return redirect()->back()->with('stripe_error','The stripe token was not generated correctly!');
            }
        } else{
            $cart = session()->get('cart'); 
            $id = $request->input('user_id');

            $order = new Order();
            $order->user_id = $id;
            $order->name = $request->input('fullname');
            $order->country = $request->input('country');
            $order->city = $request->input('city');
            $order->province = $request->input('province');
            $order->address = $request->input('address');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->note = $request->input('note');
            $order->typeOrder = $request->input('typeOrder');
            $order->is_payment = 0;
            $order->save();

            foreach($cart as $item){
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
