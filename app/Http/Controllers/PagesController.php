<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class PagesController extends Controller
{
    public function index(){
        return view('pages.beranda');
    }

    public function dashboard(){
        if (Auth::check()) {
            $title = 'Dashboard';
            return view('dashboard.dashboard')->with('title', $title);
        }
        return redirect('/login');
    }

    public function listartikel(){
        if (Auth::check()) {
            $post = Artikel::orderby('created_at', 'desc')->get();
            $jumlahcomment = Comment::where('post_id')->count();
            $title = 'LIST ARTIKEL';
            return view('dashboard.listartikel', compact('post', $post, 'jumlahcomment', $jumlahcomment))->with('title', $title);
        }
        return redirect('/login');
    }

    public function postartikel(Request $request)
    {
        $author = Auth::user()->id;
        $student = new Artikel;
        $student->judul = $request->input('judul');
        $student->content = $request->input('content');
        $student->author = $author;

        if($request->hasfile('fileimage'))
        {
            $file = $request->file('fileimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Test-Case-'.time().'.'.$extenstion;
            $file->move('images', $filename);
            $student->image = $filename;
        }
        $student->save();
        return redirect()->back()->with('message','Student Image Upload Successfully');
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
            'post_id' => 'required',
            'comments' => 'required'
        ]);

        $project = Comment::create($data);

        return redirect()->back();
    }
}
