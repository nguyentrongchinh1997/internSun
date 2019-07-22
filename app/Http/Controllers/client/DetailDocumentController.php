<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\client\DetailDocumentService;
use App\Document;

class DetailDocumentController extends Controller
{
    //
    protected $detailDocument;
    public function __construct(DetailDocumentService $detailDocument)
    {
        $this->detailDocument = $detailDocument;
    }
    public function detailDocument($tenKhongDau, $id)
    {   
        $dataReceive = $this->detailDocument->detail($id);
        $data = [
            "detail" => $dataReceive["detail"],
            "category" => $dataReceive["category"]
        ];
        return view("client.pages.document.detail", $data);

    }
}
