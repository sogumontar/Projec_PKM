<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\kendaraan;
use App\record_pemesanan_kendaraan;
class kendaraanController extends Controller
{
    public function create(){
        if(Auth::user()){
           return view('kendaraan.create');
       }
   }
   public function store(request $request){
    if(Auth::user()){
        $rew=request('gambar');
        echo Auth::user()->id;
        
       

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
               'id_pemilik'=>Auth::user()->id,
               'plat_nomor'=>request('plat'),
               'harga'=>request('harga'),
               'gambar'=>$pathw,
           ]);

      

    return redirect()->route('owner.kendaraan');
}
}
public function view(){
    
    	$kendaraan=DB::table('kendaraan')->paginate(6);
    	return view('kendaraan.view',compact('kendaraan'));
    
}
public function edit($id){
    if(Auth::user()){
        $kendaraan=kendaraan::find($id);
        $test=kendaraan::all();
        return view('kendaraan.edit',compact('kendaraan','test'));
    }
}



public function update(Request $request,$id ){
   if(Auth::user()){


    $kendaraan=kendaraan::find($id);

    
    $kendaraan->update([
        'jenis_kendaraan'=>request('jenis_kendaraan'),
        'Merk_kendaraan'=>request('Merk_kendaraan'),
        'id_pemilik'=>Auth::user()->id,
        'plat_nomor'=>request('plat_nomor'),
        'harga'=>request('harga'),
    ]);
    
    
    if(request('gambar')!=''){
        $a=request('gambar');
        
        
        
        $gambar = $request->file('gambar');
         // $namaFile = $gambar->getClientOriginalName();
        $pathw= $request->file('gambar')->store('');
        $request->file('gambar')->move('kendaraan',$pathw);
        $kendaraan->update([


            'gambar'=>$pathw,
        ]);
    }

    return redirect()->route('owner.kendaraan');
}
}
public function destroy(kendaraan $kendaraan){
    if(Auth::user()){
        $kendaraan->delete();
        if(Auth::user()->role=='owner'){
            return redirect()->route('owner.kendaraan');

        }else{
            return redirect()->route('admin.kendaraan');
        }
    }
}
public function booking($id){
    if(Auth::user()){
        $kendaraan =kendaraan::find($id);
        return view('kendaraan.booking',compact('kendaraan'));
    }else{
         return back()->with('danger','Anda Belum Login');
    }
}
public function bookingProcess(request $request,$id){
    if(Auth::user()){
        $test1= request('date');
        $test2= request('date_akhir');
        $test=DB::select("select * from record_pemesanan_kendaraan where id_kendaraan=$id AND date=$test1");
        
        $hartot=DB::SELECT("SELECT * FROM kendaraan where id=$id");
        $dol= strtotime($test2)- strtotime($test1);
        $lama= $dol/86400;
        $tot=$hartot[0]->harga*$lama;
        
        
        // echo $test[0]->id;
        // die();
        $nowwo=date("Y-m-d");
        $wonnee=strtotime($nowwo);
        $oww=date('H:i:s');
        $wonne=$wonnee+strtotime($oww);
        $inow = strtotime(request('date'));
        
        if($wonnee>$inow){
            return redirect()->route('kendaraan.view')->with('danger','Tanggal yang anda masukkan sudah lewat pilih tanggal hari ini atau hari berikutnya');
            
        }else{
            record_pemesanan_kendaraan::create([
                'id_member'=>Auth::user()->id,
                'id_kendaraan'=>$id,
                'date'=>$test1,
                'date_akhir'=>$test2,
                'lama_pemesanan'=>$lama,
                'status'=>'process',
                'harga'=>$tot,
            ]);
            return redirect()->route('kendaraan.view')->with('success','Booking Berhasil');
        }
    }
}
public function acc($id){
    if(Auth::user()){
        $kendaraan=record_pemesanan_kendaraan::find($id);
        $kendaraan->update([
            'status'=>'accept',
        ]);
        return redirect()->route('admin.request')->with('success','Berhasil Approve Booking Kendaraan');
    }
}

public function rej($id){
    if(Auth::user()){
        $kendaraan=record_pemesanan_kendaraan::find($id);
        $kendaraan->update([
            'status'=>'reject',
        ]);
        return redirect()->route('admin.request')->with('success','Berhasil Reject Booking  Kendaraan');
    }
}
public function resi($id){
    if(Auth::user()){

        $DB=DB::SELECT("SELECT * FROM record_pemesanan_kendaraan where id=$id");
        
        return view('kendaraan.resi',compact('DB'));
    }
}
}
