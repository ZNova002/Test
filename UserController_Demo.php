<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\UserModel;
class UserController extends Controller
{
    public function list(){
        $users=UserModel::all();
        return view('list_user',['users'=>$users]);
        print_r($users);
    }
    public function show($id){
        $user=UserModel::where('id',$id)->get();//print_r($user);die();
        return view('info_user',['user'=>$user]);
    }
    public function del($id){
        $rs=UserModel::where('id',$id)->delete();
        
        return redirect()->to('/danh-sach-nguoi-dung');//$users= UserModel::all();return view('list_user',['users'=>$users]);
    } 
    public function update(Request $request){
        $name =$request->input("txt_name");
        $id =$request->input("txt_id");
        UserModel::where('id',$id)->update(['name'=>$name]);
        return redirect()->to('danh-sach-nguoi-dung');
    }
    public function add(){
        return view("add_user");
    }
    public function save(Request $request){
        $name=$request->input("txt_name");
        $password=$request->input("txt_password");
        UserModel::insert(['name'=>$name,'password'=>$password]);
        return redirect()->to('danh-sach-nguoi-dung');
    }
    public function session(Request $request){
        $products=$request->session()->get('cart.products');
        return view('session_view',['products'=>$products]);
    }
}
