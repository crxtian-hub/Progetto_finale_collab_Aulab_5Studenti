<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function welcome() {
        
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('articles'));
        
        
    }
    public function about() {
        return view('about');
    }
    
    public function searchArticles(Request $request) {
        $query = $request->input('query');
        if(empty($query)) {
            return redirect()->back()->with('error', __('ui.Search field is empty'));
        }
        
        $articles = Article::where(function($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%') 
            ->orWhere('description', 'like', '%' . $query . '%'); 
        })
        ->where('is_accepted', true) 
        ->paginate(10); 
        
        
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }
    public function setLanguage($lang) {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}