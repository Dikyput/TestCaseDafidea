<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use File;

class PagesController extends Controller
{
    public function index(){
        return view('pages.beranda');
    }

    public function dashboard(){
        if (Auth::check()) {
            $author = Auth::user();
            $countA = DB::table('artikels')->where('author', $author->id)->count();
            $countC = DB::table('artikels')->where('author', $author->id)->count();
            $title = 'Dashboard';
            return view('dashboard.dashboard', compact(
                'countA',
                'countC',
            ))->with('title', $title);
        }
        return redirect('/login');
    }

    public function listartikel(){
        if (Auth::check()) {
            $post = Artikel::orderby('created_at', 'desc')->get();
            $postest = Artikel::orderby('created_at', 'desc')->get();
            $postest2 = Artikel::orderby('created_at', 'desc')->get();
            $postest3 = Artikel::orderby('created_at', 'desc')->get();
            $title = 'LIST ARTIKEL';
            return view('dashboard.listartikel', ['post'=> $post, 'postest'=> $postest, 'postest2'=> $postest2, 'postest3'=> $postest3] )->with('title', $title);
        }
        return redirect('/login');
    }

    public function editartikel(Request $request, $id)

    {
        if (Auth::check()) {
            $data = $request->all();
            if($request->hasfile('fileimage'))
            {
                $data = Artikel::find($id);
                $image_path = public_path('images/'.$data->image);
                if(File::exists($image_path)) {
                    File::delete($image_path); 
                }
                $file = $request->file('fileimage');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'Test-Case-'.time().'.'.$extenstion;
                $file->move('images', $filename);
                Artikel::where(['id' => $id])->update(['image' => $filename,]);
            }
            if ($request->isMethod('post')) {
                Artikel::where(['id' => $id])->update([
                    'judul' => $data['judul'],
                    'content' => $data['content'],
                ]);

                return redirect()->back()->with('diky_success', 'Update Berhasil');;
            }
        }
    }

    public function deleteartikel(Request $request, $id){
        if (Auth::check()) {
            $data = Artikel::find($id);
            $image_path = public_path('images/'.$data->image);
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
            if ($request->isMethod('post')) {
                Comment::where(['post_id' => $id])->delete();
                Artikel::where(['id' => $id])->delete();
                return redirect()->back()->with('diky_hapus', 'Hapus Data Berhasil');
            }
        }

    }

    public function postartikel(Request $request)
    {
        $author = Auth::user()->id;
        $artikel = new Artikel;
        $artikel->judul = $request->input('judul');
        $artikel->content = $request->input('content');
        $artikel->author = $author;

        if($request->hasfile('fileimage'))
        {
            $file = $request->file('fileimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Test-Case-'.time().'.'.$extenstion;
            $file->move('images', $filename);
            $artikel->image = $filename;
        }
        $artikel->save();
        return redirect()->back()->with('diky','Artikel Sukses Terposting');
    }

    public function artikel(){
        $post = Artikel::orderby('created_at', 'desc')->get();
        return view('pages.beranda', compact('post', $post));
    }

    public function selengkapnya($id){
        $artikel = Artikel::where('id', $id)->get();
        $artikel2 = Artikel::findOrFail($id);
        $comment = Comment::where('post_id', $id)->get();
        if($artikel2 != NULL){
            return view('pages.artikel', compact('artikel', $artikel, 'comment'));
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }
    
    public function submitcomment(Request $request){
        $data = $request->validate([
            'post_id' => 'required',
            'comments' => 'required',
            'author' => 'required',
        ]);

        $project = Comment::create($data);
        return redirect()->back();
    }
}
