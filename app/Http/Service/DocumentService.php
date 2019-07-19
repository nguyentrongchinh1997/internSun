<?php

namespace App\Http\Service;

use App\Document;

class DocumentService
{
    
    public function uploadFileDocument($document, $poster, $name)
    {
        if (!is_null($document) && !is_null($poster)) {
            $document->move("upload/document", $name);
            $poster->move("upload/document", $name."-poster");
            $format = $document ->getClientOriginalExtension(); // đuôi file tài liệu
            $result = ["format" => $format, "image" => $name."-poster", "url_document" => $name];
            return $result;

        }
    }
    

    public function create($name, $dicription, $type, $price, $preview, $page, $id_category, $result)
    {
        return Document::create([
            "name" => $name,
            "unsigned_name" => changeTitle($name),
            "dicription" => $dicription,
            "type" => $type,
            "price" => $price,
            "image" => $result["image"],
            "url_document" => $result["url_document"],
            "preview" => $preview,
            "page" => $page,
            "format" => $result["format"],
            "id_category" => $id_category,

        ]);

    }

}
