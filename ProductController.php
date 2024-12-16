<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
class ProductController extends Controller
{
    public function list(Request $request){
        $items=ProductModel::join('category', 'category.Category_id', '=', 'Product.Product_cate')->get();
        return view('product_list',['items'=>$items]);
    }
    public function show($id){
        $item=ProductModel::where('Product_id',$id)->get();//print_r($user);die();
        $categories=CategoryModel::all();
        return view('product_info',['item'=>$item,'categories'=>$categories]);
    }
    public function del($id){
        $rs=ProductModel::where('Product_id',$id)->delete();
        return redirect()->to('/danh-sach-san-pham');
    } 
    public function update(Request $request){
        $name =$request->input("txt_name");
        $description =$request->input("txt_description");
        $id =$request->input("txt_id");
        $category =$request->input("txt_category");
        if (!$request->hasFile('txt_img')) {
            // Nếu không thì in ra thông báo
            $img=$request->input("txt_img_old");
            //print_r($request->input("txt_img_old"));die();
        }else{
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('txt_img');
            $storedPath = $image->move('images', $image->getClientOriginalName());
            $img='/images/'.$image->getClientOriginalName();
        }
        ProductModel::where('Product_id',$id)->update(['Product_description'=>$description,'Product_name'=>$name,'Product_img'=>$img,'Product_cate'=>$category]);
        return redirect()->to('/danh-sach-san-pham');
    }
    public function add(){
        $categories=CategoryModel::all();
        return view("product_add",['categories'=>$categories]);
    }
    public function save(Request $request){
        $name =$request->input("txt_name");
        $description =$request->input("txt_description");
        $category =$request->input("txt_category");
        if (!$request->hasFile('txt_img')) {
            return "Vui lòng chọn ảnh";
        }else{
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('txt_img');
            $storedPath = $image->move('images', $image->getClientOriginalName());
            $img='/images/'.$image->getClientOriginalName();
        }
        ProductModel::insert(['Product_name'=>$name,'Product_description'=>$description,'Product_cate'=>$category,'Product_img'=>$img]);
        return redirect()->to('/danh-sach-san-pham');
    }
}
