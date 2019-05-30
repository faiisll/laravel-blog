<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Article;
use App\Comment;
use File;

class AdminController extends Controller
{
    public function index(){
        

        if (Auth::check()) {
            $category = Category::all();
            $post = Article::all();
            $comment = Comment::all();
            return view('admin.home',['category'=>$category, 'post'=> $post, 'comment'=> $comment]);
        }else{
            return view('welcome');
        }
    }

    public function indexCategory(){
        if (Auth::check()) {
            $category = Category::paginate(4);

            return view('admin.category', ['category'=>$category]);
        }else{
            return view('welcome');
        }
    }

    public function indexArticle(){
        if (Auth::check()) {
           $post = Article::paginate(4);
           
           return view('admin.post', ['post' => $post]);
        }else{
            return view('welcome');
        }
    }

    public function indexComment(){
        if (Auth::check()) {
            $comment = Comment::paginate(4);
            $post = Article::all();
            return view('admin.comment', ['comment' => $comment, 'post'=>$post]);
        }else{
            return redirect('welcome');
        }
    }

    // Category Control

    public function storeCategory(Request $req){
        if (Auth::check()) {
            $file = $req->file('image');
            $filename = "default.jpg";

            if ($file != null) {
                $file->move('images/category', $file->getClientOriginalName());
                $filename = $file->getClientOriginalName();     
            }

            Category::create([
                'nama'=>$req->nama,
                'deskripsi'=>$req->desk,
                'header_image'=>$filename
            ]);

            return redirect('dashboard/category');
        }else{
            return redirect('welcome');
        }
    }

    public function deleteCategory($id){
        if (Auth::check()) {
            $category = Category::find($id);
            $post = Article::where('id', $category->id)->get();

            if ($category->header_image != 'default.jpg') {
                File::delete('images/category/'.$category->header_image);
            }
                $category->delete();
                $post->each->delete();

                return redirect('dashboard/category');
            

        }else{
            return redirect('welcome');
        }
    }

    public function updateCategory(Request $req){
        if (Auth::check()) {
            $category = Category::find($req->id);
            $cari = Category::where('id', $req->id)->first();
            $file = $req->file('image');
            $category->nama = $req->nama;
            $category->deskripsi = $req->desk;

            if ($req->image == "") {
                $category->header_image = $cari->header_image;
            }else{
                $category->header_image = $file->getClientOriginalName();
                $file->move('images/category', $file->getClientOriginalName());
            }

            $category->save();
            return redirect(route('category'));
        }else{
            return redirect('welcome');
        }
    }

    // article control

    public function createArticle(){
        if (Auth::check()) {
            $post = category::all();
            return view('admin.create_article', ['post'=>$post]);
        }else{
            return rederict('welcome');
        }
        
    }

    public function storeArticle(Request $req){
        if (Auth::check()) {
            $file = $req->file('image');
            $filename = 'default.jpg';

            if ($file != null) {
                $file->move('images/post', $file->getClientOriginalName());
                $filename = $file->getClientOriginalName(); 
            }
            $judul = $req->judul;
            $result = str_replace(" ", "-", $judul);

            Article::create([
                'judul'=>$result,
                'category_id'=>$req->category,
                'isi'=>$req->isi,
                'header_image'=>$filename,
                'status'=>$req->status
            ]);

            return redirect(route('post'));
        }else{
            return rederict('welcome');
        }
    }

    public function deleteArticle($id){
        if (Auth::check()) {
            $post = Article::find($id);
            

            $post->delete();
            return redirect(route('post'));

        }else{
            return rederict('welcome');
        }
    }

    public function trash(){
        if (Auth::check()) {
            $post = Article::onlyTrashed()->paginate(4);
            $category = Category::all();
            return view('admin.trash', ['post'=>$post, 'category'=>$category]);
        }
    }

    public function permanent($id){
        if(Auth::check()){
            $post = Article::onlyTrashed()->where('id', $id);
            $comment = Comment::where('article_id', $id);
            
            $comment->delete();
            $post->forceDelete();
            return redirect(route('trash'));
        }     
    }

    public function permanentAll(){
        if(Auth::check()){
            $post = Article::onlyTrashed();
            $post->forceDelete();
            return redirect(route('trash'));
        }
    }

    public function restore($id){
        if(Auth::check()){
            $post = Article::onlyTrashed()->where('id', $id);
            $post->restore();
            return redirect(route('trash'));
        }
    }

    public function restoreAll(){
        if(Auth::check()){
            $post = Article::onlyTrashed();
            $post->restore();

            return redirect(route('post'));
        }
    }

    public function viewEachArticle($judul){
        if (Auth::check()) {
        $post = Article::where('judul', $judul)->first();
        return view('admin.eachArticle', ['post'=>$post]);
        }else{
            return rederict('welcome');
        }
    }

    public function editArticle($id){
        if (Auth::check()) {
            $category = Category::all();
            $post = Article::find($id);
            return view('admin.updateArticle', ['post'=>$post, 'category'=>$category]);
        }else{
            return rederict('welcome');
        }  
    }

    public function updateArticle(Request $req){
        if (Auth::check()) {
            $post = Article::find($req->id);
            $file = $req->file('image');
            $post->judul = str_replace(" ", "-", $req->judul);
            $post->isi = $req->isi;
            $post->status = $req->status;

            if ($req->image == null) {
                $post->header_image = $post->header_image;
            }else{
                $post->header_image = $file->getClientOriginalName();
                $file->move('images/category', $file->getClientOriginalName());
            }

            $post->save();
            return redirect(route('post'));
        }else{
            return rederict('welcome');
        }
    }

    //comment control

    public function deleteComment($id){
        if (Auth::check()) {
            $comment = Comment::find($id);
            $comment->delete();

            return redirect()->back();
        }
    }

    public function reply(Request $req){
        if (Auth::check()) {
            Comment::create([
                'article_id'=>$req->articleId,
                'nama'=>$req->nama,
                'email'=>$req->email,
                'komentar'=>$req->komentar
            ]);

            return redirect()->back();
        }
    }

}
