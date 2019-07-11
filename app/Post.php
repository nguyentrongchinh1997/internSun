<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_post";


    public function category(){
    	return $this->belongsTo("App\Category", "id_category", "id");
    }
}
