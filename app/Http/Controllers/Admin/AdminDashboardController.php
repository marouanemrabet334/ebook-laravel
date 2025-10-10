<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminDashboardController extends Controller
{
    //



    public function index(){
        return view('admin.index');
    }






}