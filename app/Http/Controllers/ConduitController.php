<?php

namespace App\Http\Controllers;

use App\Models\Conduit;
use Illuminate\Http\Request;

class ConduitController extends Controller
{
    public function home()
    {
        $conduit = Conduit::paginate(10);
        return view('conduit.home',['conduit' => $conduit]);
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

    public function article_headline($headline)
    {
        $conduit = Conduit::where('headline', $headline)->first();

        
        if ($conduit) {
          
            return view('conduit.article',['conduit' => $conduit]);
        } else {
           
            return null;
        }
    }
}
