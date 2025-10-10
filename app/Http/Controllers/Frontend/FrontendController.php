<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Routing\Controller;



class FrontendController extends Controller
{
    //



    public function index(){
        return view('frontend.index');
    }



}