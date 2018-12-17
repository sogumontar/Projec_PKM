<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\homestay;
use App\pemilik;
use App\notifikasi;
class memberController extends Controller
{
    public function booking(){
    	$a=Auth::user()->id;
    	$d=DB::select("SELECT homestay.nama , homestay.id, record_pemesanan_homestay.date,record_pemesanan_homestay.jumlah_kamar , record_pemesanan_homestay.status , record_pemesanan_homestay.id, record_pemesanan_homestay.lama_menginap from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay=homestay.id where  id_member=$a order by record_pemesanan_homestay.status ASC");

    	// $g=DB::select('select * from homestay')
    	return view('booking',compact('d'));
    }
    public function bayar($id){
    	$d=DB::select("select homestay.nama ,homestay.id, record_pemesanan_homestay.date , record_pemesanan_homestay.status , record_pemesanan_homestay.id , record_pemesanan_homestay.jumlah_pengunjung , record_pemesanan_homestay.jumlah_kamar from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay=homestay.id  where status='pending' and record_pemesanan_homestay.id=$id");

       
    	return view('bayar',compact('d'));
    }

    public function bayarProcess(request $request,$id){
        if(request('gambar')){
        	 $gambar = $request->file('gambar');
             $pathw= $request->file('gambar')->store(''); 
             $request->file('gambar')->move('struk',$pathw);
        
        	$a=DB::update("update record_pemesanan_homestay set gambar='$pathw', status='On Process' where id=$id");
            var_dump($a);
            // die();
        	// $a=DB::update("update record_pemesanan_homestay set gambar='$pathw' where id=$id");
        	// var_dump($a);
        	// die();
            return redirect()->route('member.booking')->with('success','Upload Resi Success');
        }else{
             $idd=Auth::user()->id;
            $camp=request('volume');
            $qrqw=DB::select("SELECT * FROM member where id_akun=$idd");
           $champ=$qrqw[0]->poin-$camp;
           

            $a=DB::update("update record_pemesanan_homestay set status='On Process' where id=$id");
            $v=DB::update("UPDATE member set poin =$champ where id_akun=$idd");
return redirect()->route('member.booking')->with('success','Pembayaran Berhasil');
        }
    	

    }
     public function bayarKendaraan($id){
        $d=DB::select("SELECT * from record_pemesanan_kendaraan inner join kendaraan on record_pemesanan_kendaraan.id_kendaraan=kendaraan.id  where status='process' and record_pemesanan_kendaraan.id=$id");

       
        return view('kendaraan.bayar',compact('d','id'));
    }

    public function bayarKendaraanProcess(request $request,$id){
        if(request('gambar')){
             $gambar = $request->file('gambar');
             $pathw= $request->file('gambar')->store(''); 
             $request->file('gambar')->move('struk',$pathw);
        
            $a=DB::update("update record_pemesanan_kendaraan set gambar = '$pathw' , status='On Process' where id=$id");
            // $a=DB::update("update record_pemesanan_homestay set gambar='$pathw' where id=$id");
            // var_dump($a);
            // die();
            echo $pathw;
            return redirect()->route('kendaraan.view')->with('success','Upload Resi Success');
        }else{
             $idd=Auth::user()->id;
            $camp=request('volume');
            $qrqw=DB::select("SELECT * FROM member where id_akun=$idd");
           $champ=$qrqw[0]->poin-$camp;
           

            $a=DB::update("update record_pemesanan_kendaraan set status='On Process' where id=$id");
            $v=DB::update("UPDATE member set poin =$champ where id_akun=$idd");
return redirect()->route('kendaraan.view')->with('success','Pembayaran Berhasil');
        }
        

    }
    public function poin($id){
        
        $ddd=DB::select("select homestay.nama ,homestay.id, record_pemesanan_homestay.date , record_pemesanan_homestay.status , record_pemesanan_homestay.id , record_pemesanan_homestay.jumlah_pengunjung , record_pemesanan_homestay.jumlah_kamar from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay=homestay.id  where status='pending' and record_pemesanan_homestay.id=$id");

       
        return view('poin',compact('ddd'));
    }
    public function resi($id){

        $DB=DB::SELECT("SELECT * FROM record_pemesanan_homestay where id=$id");
        
        return view('resi',compact('DB'));
    }
    public function daftar(){
        return view('owner.daftar');
    }
    public function daftarProcess(request $request){

             $gambar = $request->file('foto_ktp');
             $pathw= $request->file('foto_ktp')->store(''); 
             $request->file('foto_ktp')->move('owner',$pathw);

             $gambar2 = $request->file('foto_diri');
             $pathw2= $request->file('foto_diri')->store(''); 
             $request->file('foto_diri')->move('owner',$pathw2);

        $dol=Auth::user()->id;
        echo $dol;

             pemilik::create([
            'nama'=>request('nama'),
            'alamat'=>request('alamat'),
            'id_akun'=>Auth::user()->id,
            'tanggal_lahir'=>request('tanggal_lahir'),
            'NIK'=>request('NIK'),
            'foto_ktp'=>$pathw,
            'foto_diri'=>$pathw2,
            'status'=>'pending',

        ]);
                notifikasi::create([
           'nama'=>'Request',
           'isi'=>'Berhasil mengirimkan request, menunggu respon admin.',
           'status'=>'sukses',
           'id_penerima'=>$idd,
           ]);
             return redirect()->route('home')->with('success','Request Sukses');
    }
}
