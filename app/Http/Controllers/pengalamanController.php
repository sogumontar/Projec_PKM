<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\pengalaman;

class pengalamanController extends Controller
{
    public function create(){
    	return view('pengalaman/create');
    }
    public function store(Request $request){
            $now=date("Y-m-d");
              $file       = $request->file('gambar');
            // $fileName   = $file->getClientOriginalName();
            // $request->file('gambar')->move("upload/",$fileName);
            // $gambar = $request->file('gambar');
            $gambar = $request->file('gambar');
             // $namaFile = $gambar->getClientOriginalName();
             $pathw= $request->file('gambar')->store(''); 
             $request->file('gambar')->move('pengalaman',$pathw);

    	pengalaman::create([
    		'judul'=>Request('judul'),
    		'keterangan'=>Request('keterangan'),
    		'date'=>$now,
    		'id_member'=>Auth::user()->id,
            'gambar'=>$pathw,
            'objek_wisata'=>request('objek_wisata'),

    	]);
    	return redirect()->route('pengalaman.view');
    }
    public function  view(){
    	$pengalaman=DB::table('pengalaman')->paginate(5);
    	return view('pengalaman.view',compact('pengalaman'));
    }
    public function detail($id){
        $detail=DB::select("select * from pengalaman where id=$id");
        
        
        return view('pengalaman.detail',compact('detail'));
    }
}
