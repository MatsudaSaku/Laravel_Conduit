<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConduitController extends Controller
{
    public function home()
    {
        return view('conduit.home');
    }

    public function register()
    {
        return view('conduit.register');
    }

    public function login()
    {
        return view('conduit.login');
    }

    public function setting()
    {
        return view('conduit.setting');
    }

    public function editor()
    {
        return view('conduit.editor');
    }

}
