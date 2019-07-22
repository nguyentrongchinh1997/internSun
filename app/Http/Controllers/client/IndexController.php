<?php

namespace App\Http\Controllers\client;

use App\Http\Service\client\IndexService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    protected $document;
    public function __construct(IndexService $document)
    {
        $this->document = $document;
    }

    public function getIndexPage()
    {
        $data = $this->document->getData();
        $document = [
            "documentNew" => $data["listDocumentNew"], 
            "listDocumentPrimary" => $data["listDocumentPrimary"],
            "listDocumentSecondary" => $data["listDocumentSecondary"],
            "listDocumentHigh" => $data["listDocumentHigh"]
        ];
        return view("client.pages.index", $document);
    }
}
