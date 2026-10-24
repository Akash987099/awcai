<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function webDevelopment(){
        return view('services.web-development');
    }

    public function appDevelopment(){
        return view('services.app-development');
    }

    public function uiDevelopment(){
        return view('services.ui-ux-development');
    }
}
