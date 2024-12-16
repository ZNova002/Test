<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\CategoryModel;
class CategoryController extends Controller
{
    public function list(Request $item){
        $items=CategoryModel::all();
        return view('cate_list',['items'=>$items]);
    }
    public function show($id){
        $items=CategoryModel::where('Category_id',$id)->get();
        return view('cate_info',['items'=>$items]);
    }
    public function update(Request $request){
        $name =$request->input("txt_name");
        $description =$request->input("txt_description");
        $id =$request->input("txt_id");
        CategoryModel::where('Category_id',$id)->update(['Category_description'=>$description,'Category_name'=>$name]);
        return redirect()->to('/danh-sach-danh-muc');
    }
    public function del($id){
        $rs=CategoryModel::where('Category_id',$id)->delete();
        return redirect()->to('/danh-sach-danh-muc');
    } 
    public function add(){
        return view("cate_add");
    }
    public function save(Request $request){
        $name =$request->input("txt_name");
        $description =$request->input("txt_description");
        CategoryModel::insert(['Category_name'=>$name,'Category_description'=>$description]);
        return redirect()->to('/danh-sach-danh-muc');
    }
}                                                      
