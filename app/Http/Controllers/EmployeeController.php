<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['layout'] = 'admin.nhanvien';
        $this->data['isAdmin'] = true;

        $emps = Employee::orderBy('created_at','DESC')->get();

        return view('homeMain', $this->data, compact('emps'));
    }

    //add
    public function store(Request $request){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/imgs', $fileName);

        $empData=[
            'name' =>$request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'gender' =>$request->gender,
            'dob' =>$request->dob,
            'image' =>$fileName
        ];

        Employee::create($empData);
        return response()->json([
            'status' => 200
        ]);
    }

    //get employee by id
    public function getEmpById($id){
        $emp = Employee::find($id);
        return response()->json($emp);
    }

    //upload employee by id
    public function uploadEmp(Request $request){
        $fileName = '';
		$emp = Employee::find($request->id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/imgs', $fileName);
			if ($emp->image) {
				Storage::delete('public/imgs/' . $emp->image);
			}
		} else {
			$fileName = $request->emp_image;
		}

		$empData = [
            'name' => $request->name,
            'address' => $request->address, 
            'phone' => $request->phone,
            'gender' => $request->gender, 
            'dob' => $request->dob, 
            'image' => $fileName,
        ];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);

    }

    //delete employee by id
    public function deleteEmpById($id){
        $emp = Employee::find($id);
        Storage::delete('public/imgs/' . $emp->image);
        $emp->delete();
        return response()->json(['success'=>'Xóa bản ghi thành công!']);
    }
}
