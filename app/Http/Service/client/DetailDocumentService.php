<?php  

namespace App\Http\Service\client;

use App\User;
use App\Document;
use App\Category;

class DetailDocumentService
{
    public function detail($id)
    {
        $detail = Document::find($id);
        $category = Category::find($detail->id_category);
        $data = [
            "detail" => $detail,
            "category" => $category
        ];
        return $data;
    }
}