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
    		'date'=>Request('date'),
    		'id_member'=>Auth::user()->id,
            'gambar'=>$pathw,

    	]);
    	return redirect()->route('pengalaman.view');
    }
    public function  view(){
    	$pengalaman=pengalaman::all();
    	return view('pengalaman.view',compact('pengalaman'));
    }
    public function detail($id){
        $detail=DB::select('select * from pengalaman');
        
        
        return view('pengalaman.detail',compact('detail'));
    }
}
