<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use Auth;
use App\Category;
use App\Article;
use App\Comment;

class FrontController extends Controller
{
    public function index(){
        $category = Category::all();
        $post = Article::where('status', '=', 'publish')->paginate(2);

        return view('front.index', ['post'=>$post]);
    }

    public function viewEach($judul){
        $post = Article::where('judul', $judul)->first();
        $comment = Comment::where('article_id', $post->id)->get();
        return view('front.each', ['post'=>$post, 'comment'=>$comment]);
    }

    public function comment(Request $req){

        Comment::create([
            'article_id'=>$req->id,
            'nama'=>$req->nama,
            'komentar'=>$req->komentar,
            'email'=>$req->email
            
        ]);

        return redirect()->back();
    }
}
