<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cate'] = Category::all();
    }
    
    public function index(){
        $this->data['layout'] = 'admin.nhanvien';
        $this->data['isAdmin'] = true;

        $emps = User::where('is_admin',3)->orderBy('created_at','DESC')->get();

        return view('homeMain', $this->data, compact('emps'));
    }

    //add
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nameA' => 'required',
            'emailA' => 'required|email|unique:users,email',
            'addressA' => 'required',
            'phoneA' => 'required|numeric',
            'imageA' => 'required',
            'dobA' => 'required|numeric|max:2022',
        ],[
            'nameA.required' => 'Họ và tên bắt buộc nhập',
            'emailA.required' => 'Email bắt buộc nhập',
            'emailA.email' => 'Email chưa đúng',
            'emailA.unique' => 'Email đã tồn tại',
            'addressA.required' => 'Địa chỉ bắt buộc nhập',
            'phoneA.required' => 'Số điện thoại bắt buộc nhập',
            'phoneA.numeric' => 'Số điện thoại là số',
            'imageA.required' => 'Ảnh đại điện bắt buộc nhập',
            'dobA.required' => 'Năm sinh bắt buộc nhập',
            'dobA.numeric' => 'Năm sinh là số',
            'dobA.max' => 'Năm sinh chưa đúng',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else{
            $fileName = '';
            $file = $request->file('imageA');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/users', $fileName);
            $email = $request->emailA;
            $count = 0;
            for($i = 0; $i < strlen($email); $i++){
                if(substr($email, $i, 1) == '@'){
                    $password = 'NVK' . substr($email, 0, $count) . '@';
                    break;
                }
                $count++;
            }
            $empData=[
                'name' => $request->nameA,
                'address' => $request->addressA,
                'email' => $request->emailA,
                'phone' => $request->phoneA,
                'gender' => $request->genderA,
                'dob' => $request->dobA,
                'image' => $fileName,
                'password' => Hash::make($password),
                'is_admin' => 3,
            ];

            User::create($empData);

            return response()->json([
                'status' => 200,
                'message' => 'Thêm nhân viên kho mới thành công!',
            ]);
        }
    }

    //get employee by id
    public function getEmpById($id){
        $emp = User::find($id);
        return response()->json($emp);
    }

    //upload employee by id
    public function uploadEmp(Request $request){
        $fileName = '';
		$emp = User::find($request->id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/users', $fileName);
			if ($emp->image) {
				Storage::delete('public/users/' . $emp->image);
			}
		} else {
			$fileName = $emp->image;
		}
        
		$empData = [
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email, 
            'phone' => $request->phone,
            'gender' => $request->gender, 
            'dob' => $request->dob, 
            'image' => $fileName,
            'is_admin' => 3,
            'password' => $request->password,
        ];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);

    }

    //delete employee by id
    public function deleteEmpById($id){
        $emp = User::find($id);
        Storage::delete('public/users/' . $emp->image);
        $emp->delete();
        return response()->json(['success'=>'Xóa bản ghi thành công!']);
    }
}
