<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }
    
    public function about() {
        // $names = ['Divid', 'Michael', 'John', 'Dary'];
        $names = [];
        return view('about', ['names' => $names]);
    }
}
