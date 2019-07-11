<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_category";

    public function post(){
        return $this->hasMany("App\Post", "id_category", "id");
    }

    public  function document(){
        return $this->hasMany("App\Document", "id_category", "id");
    }
}
