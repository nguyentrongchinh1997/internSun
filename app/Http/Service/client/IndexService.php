<?php  

namespace App\Http\Service\client;

use App\User;
use App\Document;

class IndexService
{
    public function getData()
    {
        $listDocumentNew = Document::orderBy("date", "DESC")->take(12)->get();
        $listDocumentPrimary = Document::where("id_category", 2)->take(6)->get(); // tài liệu tiểu học
        $listDocumentSecondary = Document::where("id_category", 4)->take(6)->get(); // tài liệu trung học cơ sở
        $listDocumentHigh = Document::where("id_category", 3)->take(6)->get(); // tài liệu trung học cơ sở 
        $data = [
            "listDocumentNew" => $listDocumentNew,
            "listDocumentPrimary" => $listDocumentPrimary,
            "listDocumentSecondary" => $listDocumentSecondary,
            "listDocumentHigh" => $listDocumentHigh
        ];
        return $data;
    }
}