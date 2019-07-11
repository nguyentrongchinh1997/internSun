<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_document";


    public function category(){
    	return $this->belongsTo("App\Category", "id_category", "id");
    }
}
