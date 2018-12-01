<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\pengalaman;
use App\homestay;
use App\kendaraan;
use App\pemilik;
use App\objekWisata;
class adminController extends Controller
{
    public function objekWisata(){
        $objekWisata=objekWisata::all();
    	return view('admin.objekWisata',compact('objekWisata'));
    }
    public function akun(){
    	$akun=user::all();
    	return view('admin.akun',compact('akun'));
    }
    public function pengalaman(){
    	$pengalaman=pengalaman::all();
    	return view('admin.pengalaman',compact('pengalaman'));
    }
    
    public function kendaraan(){
        $kendaraan=kendaraan::all();
        // $pemilik=pemilik::all();
        // print_r($kendaraan[0]->id_pemilik);
        // // die();
        // $pemilik = DB::select("select k.jenis_kendaraan , k.Merk_kendaraan , k.plat_nomor from kendaraan k 
        //     // inner join pemilik_homestay_kendaraan p on p.id=k.id_pemilik'");
        $query = DB::table('kendaraan')
           ->join('pemilik_homestay_kendaraan', 'kendaraan.id_pemilik', '=', 'pemilik_homestay_kendaraan.id')
           ->select('kendaraan.jenis_kendaraan', 'kendaraan.Merk_kendaraan', 'kendaraan.plat_nomor', 'pemilik_homestay_kendaraan.nama')
           ->get();
        return view('admin.kendaraan',compact('query'));


    }
    public function homestay(){
         $query = DB::table('homestay')
           ->join('pemilik_homestay_kendaraan', 'homestay.id_pemilik', '=', 'pemilik_homestay_kendaraan.id')
           ->select('homestay.nama', 'homestay.keterangan', 'homestay.gambar', 'pemilik_homestay_kendaraan.nama as name')
           ->get();
           return view('admin.homestay',compact('query'));
    }
}
