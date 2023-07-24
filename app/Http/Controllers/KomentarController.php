<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{

    public function save(Request $request)
    {
        Komentar::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi_komentar' => $request->isi_komentar,
            'artikel_id' =>$request->artikel_id
        ]);

        return redirect()->route('artikel.detail', $request->artikel_id);
    }
    
    public function delete(Request $request,$id){
        
        $post = Komentar::find($id); 
        $post->delete();
        return redirect()->route('artikel.detail', $request->artikel_id);; 
    }
}
