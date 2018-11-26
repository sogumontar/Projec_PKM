<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\homestay;
class homestayController extends Controller
{
    public function create(){
    	return view('homestay.create');
    }
    public function store(Request $request){
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        // $request->file('gambar')->move("upload/",$fileName);
    	// $gambar = $request->file('gambar');
        $gambar = $request->file('gambar');
         $namaFile = $gambar->getClientOriginalName();
         $pathw= $request->file('gambar')->store('');
         $request->file('gambar')->move('uploadgambar',$pathw);
     //    echo $path;
      //       $path= $request->file('gambar')->store('upload');
    		// $nomor_kamar=$request->input('nomor_kamar');
    		// $id_pemilik=$request->input('id_pemilik');
      //       $harga=$request->input('harga');
      //       $keterangan=$request->input('keterangan');
      //       $nama=$request->input('nama');
      //       $gambarr=$request->input('gambar');

        
        // $namaFile = $gambar->getClientOriginalName();
        // $request->file('gambar')->move('upload',$fileName);
        // $do = new Gambar($request->all());
        // $do->gambar=$namaFile;
        // $do->save();
            homestay::create([
            'nomor_kamar'=>request('nomor_kamar'),
            'id_pemilik'=>request('id_pemilik'),
            'harga'=>request('harga'),
            'keterangan'=>request('keterangan'),
            'nama'=>request('nama'),
            'gambar'=>$pathw,

        ]);

           // echo  DB::insert('insert into homestay(nomor_kamar,id_pemilik,harga,keterangan,nama,gambar) values(?,?,?,?,?,?)',[$nomor_kamar,$id_pemilik,$harga,$keterangan,$nama,$gambarr]);

    	return redirect()->route('homestay.create');
    }

    public function view(){
        $homestay =homestay::all();
        return view('homestay.view',compact('homestay'));
    }
    public function edit($id){
        $homestay =homestay::find($id);
        return view('homestay.edit',compact('homestay'));
    }
    public function update($id){
        $homestay =homestay::find($id);
        $homestay->update([
            'nomor_kamar'=>request('nomor_kamar'),
            'id_pemilik'=>request('id_pemilik'),
            'harga'=>request('harga'),
            'keterangan'=>request('keterangan'),
            'nama'=>request('nama'),
            'gambar'=>request('gambar'),
        ]); 

        return redirect()->route('homestay.view');

    }
     public function destroy(homestay $homestay){
        $homestay->delete();
        return redirect()->route('homestay.view');
    }
    public function search(){
        
        $homestay = DB::SELECT("select * from homestay order by keterangan DESC");
        return view('homestay.search',compact('homestay'));
    }
}
