<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\UserModel;
class UserController extends Controller
{
    public function list(Request $request){
        $users=UserModel::all();
        $cart=$request->session()->get('cart.products');
        return view('list_user',['users'=>$users,'cart'=>$cart]);
        
    }
    public function show($id){
        $user=UserModel::where('id',$id)->get();
        return view('info_user',['user'=>$user]);
    }
    public function del($id){
        $rs=UserModel::where('id',$id)->delete();
        
        return redirect()->to('/danh-sach-nguoi-dung');
    } 
    public function update(Request $request){
        $name =$request->input("txt_name");
        $id =$request->input("txt_id");
        UserModel::where('id',$id)->update(['username'=>$name]);
        return redirect()->to('danh-sach-nguoi-dung');
    }
    public function add(){
        return view("add_user");
    }
    public function save(Request $request){
        $name =$request->input("txt_name");
        $password=$request->input("txt_password");
        UserModel::insert(['username'=>$name,'password'=>$password]);
        return redirect()->to('danh-sach-nguoi-dung');
    }
}
