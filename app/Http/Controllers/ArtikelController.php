<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function readAll(Request $request)
    {
		$search = $request->search;

        if($search){
            $artikels = Artikel::where('judul','like',"%".$search."%")->get();
            return view('artikel.artikel', ['title' => "Artikel", 'artikels' => $artikels]); 
        }
        
        $artikels = Artikel::latest()-> get();

        return view('artikel.artikel', ['title' => "Artikel", 'artikels' => $artikels]);
    }

    public function read($id)
    {
        $artikel = Artikel::find($id);

        $komentar = Komentar::where('artikel_id',$id)->latest()->get();

        return view('artikel.detail_artikel', ['title' => "Artikel", 'artikel' => $artikel, 'komentars'=>$komentar]);
    }

    public function add()
    {   
        return view('artikel.tulis_artikel', ['title' => "Artikel"]);
    }

    public function save(Request $request)
    {
        Artikel::create([
            'judul' => $request->judul,
            'isi_artikel' => $request->isi_artikel,
            'penulis' => $request->penulis

        ]);

        return redirect()->route('dashboard');
    }
    
    public function delete($id){
        // Cari artikel terkait lalu delete
        Artikel::find($id)->delete(); 
        return redirect('/artikel'); 
    }
    
    }