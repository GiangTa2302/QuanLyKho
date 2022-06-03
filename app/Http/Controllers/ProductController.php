<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
// use Cart;

class ProductController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data['cats'] = Category::all();
    }
    
    public function index(){
        $this->data['layout'] = 'admin.sanpham';
        $this->data['isAdmin'] = true;

        $pros = Product::orderBy('created_at','DESC')->get();
        
        return view('homeMain', $this->data, compact('pros'));
    }

    public function add(Request $request){
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/products', $fileName);

        $proData=[
            'tenSP' =>$request->tenSP,
            'DVT' =>$request->DVT,
            'mauSac' =>$request->mauSac,
            'tgBaoQuan' =>$request->tgBaoQuan,
            'regular_price' =>$request->regular_price,
            'sale_price' =>$request->sale_price,
            'description' =>$request->description,
            'category_id' =>$request->category_id,
            'image' =>$fileName
        ];

        Product::create($proData);
        return response()->json([
            'status' => 200
        ]);
    }

    //
    public function getProById($id){
        $pro = Product::find($id);
        return response()->json($pro); 
    }

    public function getProductByCategory($id){
        $this->data['layout'] = 'clients.listProduct';
        $this->data['isAdmin'] = false;
        
        $pros = Product::where('category_id', $id)->get();
        
        return view('homeMain', $this->data, compact('pros'));
    }

    public function getDetailProById($id){
        $this->data['layout'] = 'clients.detailProduct';
        $this->data['isAdmin'] = false;

        $pro = Product::find($id);
        $cat = Category::find($pro->category_id);
        $products = Product::orderBy('created_at','DESC')->get();

        return view('homeMain', $this->data, compact('pro','cat', 'products'));
    }

    public function uploadPro(Request $request){
        $fileName = '';
		$pro = Product::find($request->id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/products', $fileName);
			if ($pro->image) {
				Storage::delete('public/products/' . $pro->image);
			}
		} else {
			$fileName = $request->pro_image;
		}

		$proData = [
            'tenSP' =>$request->tenSP,
            'DVT' =>$request->DVT,
            'mauSac' =>$request->mauSac,
            'tgBaoQuan' =>$request->tgBaoQuan,
            'regular_price' =>$request->regular_price,
            'sale_price' =>$request->sale_price,
            'description' =>$request->description,
            'category_id' =>$request->category_id,
            'image' =>$fileName,
        ];

		$pro->update($proData);
		return response()->json([
			'status' => 200,
		]);

    }

    public function deleteProById($id){
        $pro = Product::find($id);
        Storage::delete('public/products/'.$pro->image);
        $pro->delete();
        return response()->json(['success'=>'Xóa bản ghi thành công!']);
    }

    public function addToCart($id){
        $pros = Product::find($id);

        $cart = session()->get('cart');

        $cart[$id] = [
            'pro_id' => $pros->id,
            'name' => $pros->tenSP,
            'qty' => 1,
            'price' => $pros->sale_price,
            'image' => $pros->image,
        ];
        
        session()->put('cart',$cart);

        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
    }

    //Xóa sản phẩm trong giỏ hàng
    public function deleteToCart($id){
        $cart = session()->get('cart');
        
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        session()->put('cart',$cart);

        return redirect()->back()->with('success', 'Xóa sản phẩm trong giỏ hàng thành công!');
    }

    public function deleteCart(){
        $cart = session()->get('cart');
        
        session()->forget('cart', $cart);

        return redirect()->back()->with('success', 'Xóa giỏ hàng thành công!');
    }
}
