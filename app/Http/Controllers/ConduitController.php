<?php

namespace App\Http\Controllers;

use App\Models\Conduit;
use Illuminate\Http\Request;

class ConduitController extends Controller
{
    public function home()
    {
        $Conduit = Conduit::all();
        return view('conduit.home',['conduit' => $Conduit]);
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
