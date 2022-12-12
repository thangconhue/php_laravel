<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Categories;
use Validator;
class CategoriesController extends Controller
{
    public function read(){
        /*
            truy van du lieu
            DB::table("users") tac dong vao bang users
            orderBy("id,"desc) <=>order by id desc
            paginate(4) <=> phan 4 ban ghi tren mot trang
        */
        $data = Categories::orderBy("id","desc")->paginate(4);
        //goi view
        return view("backend.categories_read",["data"=>$data]);
    }
    //update - GET
    public function update($id){
        //tao mot action de dua vao thuoc tinh action cua the form
        $action = url("admin/categories/update/$id");
        //lay mot ban ghi
        //first() <=> lay mot ban ghi
        $record = Categories::where("id","=",$id)->first();
        return view("backend.categories_create_update",["record"=>$record,"action"=>$action]);
    }
    //update - POST
    public function updatePost($id){
        $name = request("name");
        //update name
        Categories::where("id","=",$id)->update(["name"=>$name]);
        //di chuyen den 1 url khac
        return redirect(url("admin/categories"));
    }
    public function create(){
        $action = url("admin/categories/create");
        return view("backend.categories_create_update",["action"=>$action]);
    }
    public function createPost(){
        $name = request("name");
        //insert
            Categories::insert(["name"=>$name]);
            //di chuyen den url khac
            return redirect(url("admin/categories"));
    }
    //delete
    public function delete($id){
        //lay mot ban ghi
        //first() <=> lay 1 ban ghi
        Categories::where("id","=",$id)->delete();
        //di chuyen den mot url khac
        return redirect(url("admin/categories"));
    }
}
