<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\kendaraan;
class kendaraanController extends Controller
{
    public function create(){
    	return view('kendaraan.create');
    }
    public function store(){
    	kendaraan::create([
    	'jenis_kendaraan'=>request('jenis'),
    	'Merk_kendaraan'=>request('merk'),
    	'id_pemilik'=>request('id'),
    	'plat_nomor'=>request('plat'),
    	'harga'=>request('harga'),
    	]);
    	return redirect()->route('kendaraan.view');
    }
    public function view(){
    	$kendaraan=kendaraan::all();
    	return view('kendaraan.view',compact('kendaraan'));
    }
    public function edit($id){
        $kendaraan=kendaraan::find($id);
        $test=kendaraan::all();
        return view('kendaraan.edit',compact('kendaraan','test'));
    }



    public function update(Request $request,$id ){
         // $gambar = $request->file('gambar');
         // // $namaFile = $gambar->getClientOriginalName();
         // $pathw= $request->file('gambar')->store('');
         // $request->file('gambar')->move('kendaraan',$pathw);


        $kendaraan=kendaraan::find($id);
        $a=request('gambar');
        $kendaraan->update([
            'jenis_kendaraan'=>request('jenis_kendaraan'),
            'Merk_kendaraan'=>request('Merk_kendaraan'),
            'id_pemilik'=>request('id_pemilik'),
            'plat_nomor'=>request('plat_nomor'),
            'harga'=>request('harga'),
        ]);

        if($a!='')
            $kendaraan->update([

                'gambar'=>request('gambar'),
            ]);

        echo $a;
        // return redirect()->route('kendaraan.view');
    }
}
