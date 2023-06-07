<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class PagesController extends Controller
{
    public function index(){
        return view('pages.beranda');
    }

    public function artikel(){
        $post = Artikel::orderby('created_at', 'desc')->get();
        return view('pages.beranda', compact('post', $post));
    }

    public function selengkapnya(Request $request, $id){
        $artikel = Artikel::where('id', $id)->get();
        $comment = Comment::where('post_id', $id)->get();
        return view('pages.artikel', compact('artikel', $artikel, 'comment'));
    }
    
    public function submitcomment(Request $request){
        $data = $request->validate([
            'user_id' => "required",
            'post_id' => 'required',
            'comments' => 'required'
        ]);

        $project = Comment::create($data);

        return redirect()->back();
    }
}
