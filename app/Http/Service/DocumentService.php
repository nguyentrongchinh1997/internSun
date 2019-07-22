<?php

namespace App\Http\Service;

use App\Document;

class DocumentService
{
    
    public function uploadFileDocument($document, $poster, $name)
    {
        if (!is_null($document) && !is_null($poster)) {
            $document->move("upload/document", $name."-".rand());
            $poster->move("upload/document", $name."-poster-".rand());
            $format = $document ->getClientOriginalExtension(); // đuôi file tài liệu
            $result = ["format" => $format, "image" => $name."-poster".rand(), "url_document" => $name."-".rand()];
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

    public function edit($id, $name, $dicription, $type, $price, $preview, $page, $id_category, $document, $poster)
    {
        $olderDocument = Document::find($id);
        if (!is_null($document)) {
            $nameDocument = changeTitle($name)."-".rand();
            $document->move("upload/document", $nameDocument);
            $format = $document ->getClientOriginalExtension(); // đuôi file tài liệu
        } else {
            $nameDocument = $olderDocument->url_document;
            $format = $olderDocument->format;

        }
        if (!is_null($poster)) {
            $nameImage = changeTitle($name)."-poster-".rand();
            $poster->move("upload/document", $nameImage);
            
        } else {
            $nameImage = $olderDocument->image;
        }
        
        $olderDocument->name = $name;
        $olderDocument->unsigned_name = changeTitle($name);
        $olderDocument->dicription = $dicription;
        $olderDocument->type = $type;
        $olderDocument->price = $price;
        $olderDocument->image = $nameImage;
        $olderDocument->url_document = $nameDocument;
        $olderDocument->preview = $preview;
        $olderDocument->page = $page;
        $olderDocument->format = $format;
        $olderDocument->id_category = $id_category;
        return $olderDocument->save();
       
    }

}
