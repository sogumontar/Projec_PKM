<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\homestay;
class memberController extends Controller
{
    public function booking(){
    	$a=Auth::user()->id;
    	$d=DB::select("select homestay.nama , record_pemesanan_homestay.date , record_pemesanan_homestay.status , record_pemesanan_homestay.id from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay=homestay.id where  id_member=$a");
    	// $g=DB::select('select * from homestay')
    	return view('booking',compact('d'));
    }
    public function bayar($id){
    	$d=DB::select("select homestay.nama , record_pemesanan_homestay.date , record_pemesanan_homestay.status , record_pemesanan_homestay.id , record_pemesanan_homestay.jumlah_pengunjung , record_pemesanan_homestay.jumlah_kamar from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay=homestay.id  where status='pending' and record_pemesanan_homestay.id=$id");

       
    	return view('bayar',compact('d'));
    }
    public function bayarProcess(request $request,$id){

    	 $gambar = $request->file('gambar');
         $pathw= $request->file('gambar')->store(''); 
         $request->file('gambar')->move('struk',$pathw);

    	$a=DB::update("update record_pemesanan_homestay set gambar='$pathw', status='On Process' where id=$id");
    	// $a=DB::update("update record_pemesanan_homestay set gambar='$pathw' where id=$id");
    	// var_dump($a);
    	// die();
    	return redirect()->route('member.booking')->with('success','Upload Resi Success');

    }
}
