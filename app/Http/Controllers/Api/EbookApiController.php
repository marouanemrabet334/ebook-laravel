<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EbookResource;
use App\Models\Ebook;

class EbookApiController extends Controller
{
        public function showEbook()
    {

        $ebooks = Ebook::where('status', 1)
            ->latest()
            ->with(['author', 'pdf'])
            ->get();
        $books =  EbookResource::collection($ebooks);

        return
            response()->json($books, 200);
    }

        public function showSoonEbook()
    {
        $ebooks = Ebook::where('soon', 1)
            ->latest()
            ->with(['author', 'pdf'])
            ->get();
        $soon = EbookResource::collection($ebooks);
        return response()->json($soon, 200);
    }
}