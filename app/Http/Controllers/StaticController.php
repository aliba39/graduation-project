<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    function index() {
        return view('index');
    }

    function about() {
        return view('about');
    }


    

    /* function email_form() {
        return view('email_form');
    } */
}
