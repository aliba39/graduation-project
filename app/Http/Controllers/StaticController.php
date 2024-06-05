<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    function index() {
        return view('index');

    }

    function about() {
        return view('about');
    }

    function request_sent() {
        return view('request-sent');
    }

}
