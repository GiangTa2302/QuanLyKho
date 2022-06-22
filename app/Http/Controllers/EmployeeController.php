<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data['countN'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','nhap')->count();
        $this->data['countX'] = DB::table('orders')->where('is_check','=',NULL)->where('typeOrder','=','xuat')->count();
        $this->data['cats'] = Category::all();
    }
    
    public function index(){
        $this->data['layout'] = 'admin.nhanvien';
        $this->data['isAdmin'] = true;

        $emps = User::where('is_admin',3)->orderBy('created_at','DESC')->get();

        return view('homeMain', $this->data, compact('emps'));
    }

    //add
    public function store(Request $request){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/users', $fileName);
        $email = $request->email;
        $count = 0;
        for($i = 0; $i < strlen($email); $i++){
            if(substr($email, $i, 1) == '@'){
                $password = 'NVK' . substr($email, 0, $count) . '@';
                break;
            }
            $count++;
        }
        $empData=[
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'image' => $fileName,
            'password' => Hash::make($password),
            'is_admin' => 3,
        ];

        User::create($empData);
        return response()->json([
            'status' => 200
        ]);
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
