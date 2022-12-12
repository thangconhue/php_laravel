<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//su dung mo hinh MVC
//load class Model de su dung o day
use App\Models\News;

//su dung mo hinh MVC: lay du lieu tu model

class NewsController extends Controller
{
    //tao bien model  (la mot bien trong class NewsController)
    public $model;
    //ham tao
    public function __construct(){
    	//gan bien $model de tro thanh bien object class News
    	$this->model = new News();
    }
    //lay danh sach cac ban ghi
    public function read(){
    	//lay du lieu tu ham modelRead cua class News
    	$data = $this->model->modelRead();
    	//goi view, truyen du lieu ra view
    	return view("backend.news_read",["data"=>$data]);
    }
    public function update($id){
    	$action = url("admin/news/update/$id");
    	//lay mot du lieu tu model
    	$record = $this->model->modelGetRecord($id);
    	return view("backend.news_create_update",["record"=>$record,"action"=>$action]);
    }
    //update - POST
    public function updatePost($id){
    	$this->model->modelUpdate($id);
    	return redirect(url('admin/news'));
    }
    //create
    public function create(){
        //tao mot action de dua vao thuoc tinh action cua the form
        $action = url("admin/news/create");
        return view("backend.news_create_update",["action"=>$action]);
    }
    //create post
    public function createPost(){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    //delete
    public function delete($id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
