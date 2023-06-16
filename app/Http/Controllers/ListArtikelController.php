<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ListArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (Auth::check()) {
                $post = Artikel::orderby('created_at', 'desc')->get();
                $postest = Artikel::orderby('created_at', 'desc')->get();
                $postest2 = Artikel::orderby('created_at', 'desc')->get();
                $postest3 = Artikel::orderby('created_at', 'desc')->get();
                $title = 'LIST ARTIKEL';
                return view('dashboard.listartikel.index', compact('post', 'postest', 'postest2', 'postest3'))->with('title', $title);
            }
            return redirect('/login');
        }catch(Exception $err) {
            dd($err->getMessage());
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (Auth::check()) {
                $title = 'CREATE ARTIKEL';
                return view('dashboard.listartikel.createpost')->with('title', $title);
            }
            return redirect('/login');
        }catch(Exception $err) {
            dd($err->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (Auth::check()) {
                $post = $request->all();
                $post['author'] = Auth::user()->id;
                if($request->hasfile('fileimage'))
                {
                    $file = $request->file('fileimage');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = 'Test-Case-'.time().'.'.$extenstion;
                    $file->move('images', $filename);
                    $image = $filename;
                    $post['image'] = $filename;
                }
                Artikel::create($post);                
                return redirect('/listartikel')->with('diky','Artikel Sukses Terposting');
            }
            return redirect('/login');
        }catch(Exception $err) {
            dd($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $title = 'EDIT ARTIKEL';
        return view('dashboard.listartikel.editpost', ['artikel' => $artikel])->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if (Auth::check()) {
                $this->validate($request,[
                    'judul' => 'required',
                    'content' => 'required'
                ]);
                $updatepost = Artikel::find($id);
                $updatepost->judul = $request->judul;
                $updatepost->content = $request->content;

                if($request->hasfile('fileimage'))
                {
                    $file = $request->file('fileimage');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = 'Test-Case-'.time().'.'.$extenstion;
                    $file->move('images', $filename);
                    $updatepost['image'] = $filename;
                }
                $updatepost->save();
                return redirect('/listartikel')->with('diky','Artikel Sukses Terposting');
            }
        return redirect('/login');
        }catch(Exception $err) {
            dd($err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (Auth::check()) {
                Comment::where(['post_id' => $id])->delete();
                $postid = Artikel::where('id', $id);
                $postid->delete();          
                return redirect('/listartikel')->with('diky','Artikel Sukses Terposting');
            }
            return redirect('/login');
        }catch(Exception $err) {
            dd($err->getMessage());
        }
    }
}
