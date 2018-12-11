<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\kendaraan;
use App\record_pemesanan_kendaraan;
class kendaraanController extends Controller
{
    public function create(){
    	return view('kendaraan.create');
    }
    public function store(request $request){
         $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        // $request->file('gambar')->move("upload/",$fileName);
        // $gambar = $request->file('gambar');
        $gambar = $request->file('gambar');
         // $namaFile = $gambar->getClientOriginalName();
         $pathw= $request->file('gambar')->store(''); 
         $request->file('gambar')->move('kendaraan',$pathw);
         $a=Auth::user()->id;
    	kendaraan::create([
    	'jenis_kendaraan'=>request('jenis'),
    	'Merk_kendaraan'=>request('merk'),
    	'id_pemilik'=>$a,
    	'plat_nomor'=>request('plat'),
    	'harga'=>request('harga'),
        'gambar'=>$pathw,
    	]);
    	return redirect()->route('owner.kendaraan');
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
         


        $kendaraan=kendaraan::find($id);
        $a=request('gambar');
        $kendaraan->update([
            'jenis_kendaraan'=>request('jenis_kendaraan'),
            'Merk_kendaraan'=>request('Merk_kendaraan'),
            'id_pemilik'=>request('id_pemilik'),
            'plat_nomor'=>request('plat_nomor'),
            'harga'=>request('harga'),
        ]);
        
         return redirect()->route('owner.kendaraan');
        if($a!='')
            $gambar = $request->file('gambar');
         // $namaFile = $gambar->getClientOriginalName();
         $pathw= $request->file('gambar')->store('');
         $request->file('gambar')->move('kendaraan',$pathw);
            $kendaraan->update([


                'gambar'=>$pathw,
            ]);

        return redirect()->route('owner.kendaraan');
    }
    public function destroy(kendaraan $kendaraan){
        $kendaraan->delete();
        if(Auth::user()->role=='owner'){
            return redirect()->route('owner.kendaraan');

        }else{
            return redirect()->route('admin.kendaraan');
        }
    }
    public function booking($id){
        $kendaraan =kendaraan::find($id);
        return view('kendaraan.booking',compact('kendaraan'));
    }
    public function bookingProcess(request $request,$id){
        $test1= request('date');
        $test=DB::select("select * from record_pemesanan_kendaraan where id_kendaraan=$id AND date=$test1");
        echo $test1;
        echo "<br>";
        // echo $test[0]->id;
        // die();
          $nowwo=date("Y-m-d");
        $wonnee=strtotime($nowwo);
        $oww=date('H:i:s');
        $wonne=$wonnee+strtotime($oww);
        $inow = strtotime(request('date'));

         if($wonnee>$inow){
            return redirect()->route('homestay.view')->with('danger','Tanggal yang anda masukkan sudah lewat pilih tanggal hari ini atau hari berikutnya');
        }else if(!$test){
             return redirect()->route('homestay.view')->with('danger','Kendaraan yang anda pilih telah di pesan pada tanggal yang anda masukkan. ');
        }else{
            record_pemesanan_kendaraan::create([
                'id_member'=>Auth::user()->id,
                'id_kendaraan'=>$id,
                'date'=>request('date'),
                'lama_pemesanan'=>request('lama'),
            ]);
              return redirect()->route('homestay.view')->with('success','Booking Berhasil');
        }
    }
}
