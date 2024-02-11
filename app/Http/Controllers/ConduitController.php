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

    public function article_editor($id)
    {
        $article = Conduit::findOrFail($id);

        return view('conduit.editor',['conduit' => $article]);
    }

    public function update_editor(Request $request, $id)
{
    $data = $request->validate([
        'headline' => 'required|string|max:255',
        'headline2' => 'required|string|max:255',
        'text' => 'required|string',
        'tags' => 'nullable|string',
    ]);

    $article = Conduit::findOrFail($id);

    $article->headline = $data['headline'];
    $article->headline2 = $data['headline2'];
    $article->text = $data['text'];
    $article->tags = $data['tags'];
    $article->save();

    return redirect()->route('home');
}

    public function create()
    {
        return view('conduit.create');
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

    public function delete($id)
    {
        $article = Conduit::findOrFail($id);
    
        $article->delete();

        return redirect()->route('home'); 
    }

    public function article_create(Request $request)
{
    
    $data = $request->validate([
        'headline' => 'required|string|max:255',
        'headline2' => 'required|string|max:255',
        'text' => 'required|string',
        'tags' => 'nullable|string',
    ]);

    
    $article = new Conduit();
    $article->headline = $data['headline'];
    $article->headline2 = $data['headline2'];
    $article->text = $data['text'];
    $article->tags = $data['tags'];
    $article->save();

    
    return redirect()->route('home');
}
}
