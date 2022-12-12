<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //khai bao ten table su dung
    protected $table = "categories";
    //neu ben table categories khong co 2 cot create_at va update_at thi phai khai bao dong code ben duoi
    public $timestamps = false;
}
