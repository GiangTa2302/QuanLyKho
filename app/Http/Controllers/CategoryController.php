<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $data = [];
    //Lấy ra danh sách các danh mục
    public function __construct(){
        // $cats = Category::all();

        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cate'] = Category::all();
    }
    
    public function index(){
        $this->data['layout'] = 'admin.danhmuc';
        $this->data['isAdmin'] = true;

        $cats = Category::all();

        return view('homeMain', $this->data, compact('cats'));
    }

     //add
     public function store(Request $request){

        $cateData=[
            'name' =>$request->name,
        ];

        Category::create($cateData);
        return response()->json([
            'status' => 200
        ]);
    }

    //get cate by id
    public function getCateById($id){
        $cate = Category::find($id);
        return response()->json($cate);
    }

    //upload cate by id
    public function uploadCate(Request $request){
		$cate = Category::find($request->id);

		$cateData = [
            'name' => $request->name,
        ];

		$cate->update($cateData);
		return response()->json([
			'status' => 200,
		]);
    }

    //delete cate by id
    public function deleteCateById($id){
        $cate = Category::find($id);       
        $cate->delete();
        
        return response()->json(['success'=>'Xóa danh mục '.$id.' thành công!']);
    }
    
}
