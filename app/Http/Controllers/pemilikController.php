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
    	$homestay=homestay::all();
    	$a=Auth::user()->id;
    	// echo Auth::user()->id;
    	// die();
    	 $config= DB::select('select * from homestay where id_pemilik=? ',[$a]);

    	return view('owner.homestay',compact('config'));
    }
    public function kendaraan(){
    	$kendaraan=kendaraan::all();
    	$a=Auth::user()->id;
    	$config= DB::select('select * from kendaraan where id_pemilik=? ',[$a]);
    	return view('owner.kendaraan',compact('config'));
    }
    public function pengalaman(){
    	$pengalaman=pengalaman::all();

    	return view('owner.pengalaman',compact('pengalaman'));
    }
    public function  owner(){
    	return view('owner.owner');
    }
    // $config= DB::select('select id from users where email=? AND password=?',[$email,md5($password)]);
}
