<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class UsersController extends Controller
{
    public function read(){
        $data = Db::table("users")->orderBy("id", "desc")->paginate(4);
        return view("backend.users_read",["data"=>$data]);
    }
    public function update($id){
    	//tao mot action de dua vao thuoc tinh action cua the form
    	$action = url("admin/users/update/$id");
    	//lay mot ban ghi
    	//first() <=> lay mot ban ghi
    	$record = DB::table("users")->where("id","=",$id)->first();
    	return view("backend.users_create_update",["record"=>$record,"action"=>$action]);
    }
    public function updatePost($id){
    	$name = request("name");
    	$password = request("password");
    	//update name
    	DB::table("users")->where("id","=",$id)->update(["name"=>$name]);
    	//
    	if($password != ""){
    		$password = Hash::make($password);
    		DB::table("users")->where("id","=",$id)->update(["password"=>$password]);
    	}
    	return redirect(url("admin/users"));
    }
    public function create(){
    	$action = url("admin/users/create");
    	return view("backend.users_create_update",["action"=>$action]);
    }
    public function createPost(){
    	$email = request("email");
    	$name = request("name");
    	$password = request("password");

    	$password = Hash::make($password);

    	$countEmail = DB::table("users")->where("email","=",$email)->Count();
    	if($countEmail == 0){

    		DB::table("users")->insert(["email"=>$email,"name"=>$name,"password"=>$password]);
    		return redirect(url("admin/users"));
    	}
    	else
    		return redirect(url("admin/users/create?notify=emailExists"));
    }
    //delete
    public function delete($id){
    	//lay mot ban ghi
    	//first() <=> lay 1 ban ghi
    	DB::table("users")->where("id","=",$id)->delete();
    	//di chuyen den mot url khac
    	return redirect(url("admin/users"));
    }
}
