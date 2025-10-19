<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorApiController extends Controller
{
        public function showAuthors()
    {
        $authors = Author::latest()->get();
        return AuthorResource::collection($authors)->response()->setStatusCode(200);
    }

}