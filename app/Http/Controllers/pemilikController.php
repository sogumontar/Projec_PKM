<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use App\Auth;
use App\homestay;
use App\pengalaman;
use App\kendaraan;

class pemilikController extends Controller
{
    public function homestay(){
        if(Auth::user()){
         $homestay=homestay::all();
         $a=Auth::user()->id;
    	// echo Auth::user()->id;
    	// die();
         $config= DB::select("select * from homestay where id_pemilik=$a");

         return view('owner.homestay',compact('config'));
     }
 }
 public function kendaraan(){
    if(Auth::user()){
     $kendaraan=kendaraan::all();
     $a=Auth::user()->id;
     $config= DB::select("select * from kendaraan where id_pemilik=$a");
     return view('owner.kendaraan',compact('config'));
 }
}
public function pengalaman(){
 $pengalaman=pengalaman::all();

 return view('owner.pengalaman',compact('pengalaman'));
}
public function  owner(){
    $id=AUTH::user()->id;
    $db=DB::select("SELECT * from record_pemesanan_homestay inner join homestay on record_pemesanan_homestay.id_homestay = homestay.id  where homestay.id_pemilik=$id");
    $dbb=DB::select("SELECT * from record_pemesanan_kendaraan inner join kendaraan on record_pemesanan_kendaraan.id_kendaraan = kendaraan.id where kendaraan.id_pemilik=$id");

    return view('owner.owner',compact('db','dbb'));
}
public function booking(){
 $id=Auth::user()->id;
    	// echo $id;
    	// die();
 $test=DB::SELECT('select * from record_pemesanan_homestay
  inner join homestay
  on record_pemesanan_homestay.id_homestay = homestay.id 
  where homestay.id_pemilik=146');
 return view('owner.booking',compact('test'));
}

    // $config= DB::select('select id from users where email=? AND password=?',[$email,md5($password)]);
}
