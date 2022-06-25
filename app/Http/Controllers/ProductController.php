<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cate'] = Category::all();
    }
    
    public function index($category_id){
        $this->data['layout'] = 'admin.sanpham';
        $this->data['isAdmin'] = true;

        $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->get();
        $pros1 = array();
        $pros2 = array();
        $i = 0; $m = 0;
        $date = date('Y-m-d');
        foreach ($products as $item) {
            $tgBQ = $item->tgBaoQuan;
            if(strtotime($tgBQ) > strtotime($date)){
                $pros1[$i] = $item;
                $i++;
            } else{
                $pros2[$m] = $item;
                $m++;
            }
        }
        $cats = Category::all();

        return view('homeMain', $this->data, compact('pros1','pros2','cats'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'tenSP' => 'required',
            'DVT' => 'required',
            'mauSac' => 'required',
            'tgBaoQuan' => 'required|date:"m-d-Y"',
            'giaNhap' => 'required|numeric',
            'giaXuat' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ],[
            'tenSP.required' => 'Tên sản phẩm bắt buộc nhập',
            'DVT.required' => 'Đơn vị tính bắt buộc nhập',
            'mauSac.required' => 'Màu sắc bắt buộ nhập',
            'tgBaoQuan.required' => 'Ngày hết hạn bắt buộc nhập',
            'tgBaoQuan.date' => 'Ngày hết hạn chưa đúng',
            'giaNhap.required' => 'Giá nhập bắt buộc nhập',
            'giaNhap.numeric' => 'Giá nhập là số',
            'giaXuat.required' => 'Giá xuất bắt buộc nhập',
            'giaXuat.numeric' => 'Giá xuất là số',
            'description.required' => 'Mô tả sản phẩm bắt buộc nhâp',
            'image.required' => 'Ảnh sản phẩm bắt buộc nhập',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else{
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $fileName);

            $proData=[
                'tenSP' =>$request->tenSP,
                'DVT' =>$request->DVT,
                'mauSac' =>$request->mauSac,
                'tgBaoQuan' =>$request->tgBaoQuan,
                'giaNhap' =>$request->giaNhap,
                'giaXuat' =>$request->giaXuat,
                'description' =>$request->description,
                'category_id' =>$request->category_id,
                'image' =>$fileName 
            ];

            Product::create($proData);
            return response()->json([
                'status' => 200,
                'message' => 'Thêm sản phẩm mới thành công!',
            ]);
        }
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

    public function updatePro(Request $request){
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
			$fileName = $pro->image;
		}

		$proData = [
            'tenSP' => $request->tenSP,
            'DVT' => $request->DVT,
            'mauSac' => $request->mauSac,
            'tgBaoQuan' => date('Y-m-d', strtotime($request->tgBaoQuan)),
            'giaNhap' => $request->giaNhap,
            'giaXuat' => $request->giaXuat,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $fileName,
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

    public function addToCart($id, $role){
        $pros = Product::find($id);

        $cart = session()->get('cart');

        $cart[$id] = [
            'pro_id' => $pros->id,
            'name' => $pros->tenSP,
            'qty' => 1, 
            'price' => ($role == 0) ? $pros->giaXuat : $pros->giaNhap,
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

    public function addQuantity($id, $role){
        $pros = Product::find($id);

        $cart = session()->get('cart');
        
        $qty = $cart[$id]['qty'];
        $qty++;

        if($role == 0){
            $cart[$id] = [
                'pro_id' => $pros->id,
                'name' => $pros->tenSP,
                'qty' => $qty > $pros->quantity ? $pros->quantity : $qty, 
                'price' => $pros->giaXuat,
                'image' => $pros->image,
            ];
        }
        else {
            $cart[$id] = [
                'pro_id' => $pros->id,
                'name' => $pros->tenSP,
                'qty' => $qty, 
                'price' => $pros->giaNhap,
                'image' => $pros->image,
            ];
        }
        
        
        session()->put('cart',$cart);

        return redirect()->back();
    }
    
    public function removeQuantity($id){
        $pros = Product::find($id);

        $cart = session()->get('cart');
        
        $qty = $cart[$id]['qty'];
        $qty--;

        $cart[$id] = [
            'pro_id' => $pros->id,
            'name' => $pros->tenSP,
            'qty' => $qty > 1 ? $qty : 1, 
            'price' => $pros->giaXuat,
            'image' => $pros->image,
        ];
        
        session()->put('cart',$cart);

        return redirect()->back();
    }
}
