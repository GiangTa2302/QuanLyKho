<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public $data = [];

    public function __construct(){
        
    }

    public function index(Request $request){
        $this->data['isAdmin'] = true;
        if($request->path() == 'admin/khach-hang'){
            $this->data['layout'] = 'admin.khachhang';
            

            $users = User::where('is_admin',0)->orderBy('created_at','DESC')->get();

            return view('homeMain', $this->data,compact('users'));
        }
        else if($request->path() == 'admin/nha-cung-cap'){
            $this->data['layout'] = 'admin.nhacc';

            $users = User::where('is_admin',2)->orderBy('created_at','DESC')->get();

            return view('homeMain', $this->data,compact('users'));
        }
    }

    //add
    public function store(Request $request){
        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/users', $fileName);

        $userData=[
            'name' =>$request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'image' =>$fileName,
        ];

        User::create($userData);
        return response()->json([
            'status' => 200
        ]);
    }

    //get user by id
    public function getUserById($id){
        $user = User::find($id);
        return response()->json($user);
    }

    //upload user by id
    public function uploadUser(Request $request){
        $fileName = '';
		$user = User::find($request->id);

		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/users', $fileName);
			if ($user->image && $user->image != "1652787335.jpg") {
				Storage::delete('public/users/' . $user->image);
			}
		} else {
			$fileName = $request->user_image;
		}

		$userData = [
            'name' => $request->name,
            'address' => $request->address, 
            'phone' => $request->phone, 
            'email' =>$request->email,
            'image' => $fileName,
        ];

		$user->update($userData);
		return response()->json([
			'status' => 200,
		]);
    }

    //delete user by id
    public function deleteUserById($id){
        $user = User::find($id);
        Storage::delete('public/users/' . $user->image);
        $user->delete();
        return response()->json(['success'=>'Xóa bản ghi thành công!']);
    }

    public function getDetailUser($id){
        $this->data['layout'] = 'clients.myAccount';
        $this->data['isAdmin'] = false;

        $cats = Category::all();
        $user = User::find($id);
        
        return view('homeMain', $this->data, compact('cats','user'));
    }

}
