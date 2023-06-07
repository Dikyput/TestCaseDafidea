<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class PagesController extends Controller
{
    public function index(){
        return view('pages.beranda');
    }

    public function artikel(){
        $post = Artikel::orderby('created_at', 'desc')->get();
        return view('pages.beranda', compact('post', $post));
    }

    public function selengkapnya($id){
        $idartikel = $id;
        $artikel = Artikel::find($idartikel)->get();
        return view('pages.artikel', compact('artikel', $artikel));
    }
}
