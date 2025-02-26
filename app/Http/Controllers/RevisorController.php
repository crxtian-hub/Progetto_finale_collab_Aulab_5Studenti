<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
    
    
    // accettazione articolo
    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message', __('ui.Accepted Article') . "$article->title");
    }
    
    // rifiuta articolo
    public function reject(Article $article){
        $article->setAccepted(false);
        $article->delete();
        return redirect()->back()->with('message', __('ui.Refuted Article') . "$article->title");
    }

    public function questionRevisor(){
        return view('revisor.question');
    }

    public function becomeRevisor(Request $request){
        $request->validate([
            'description' => 'required|min:10',
        ]);

        $user = auth()->user();
        $description = $request->input('description');

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->description));
    
        return redirect()->route('welcome')->with('message', __('ui.become revisor request'));
    }
    

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('welcome')->with('message', __('ui.become revisor'));
    }

    public function sendToReview(Article $article)
{
    $article->is_accepted = null;  // Rimette l'articolo in revisione
    $article->save();

    return redirect()->route('welcome')->with('message', __('ui.article sent for review') . "$article->title");
}

}
