<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\pengalaman;
use App\homestay;

class adminController extends Controller
{
    public function objekWisata(){
    	return view('admin.objekWisata');
    }
    public function akun(){
    	$akun=user::all();
    	return view('admin.akun',compact('akun'));
    }
    public function pengalaman(){
    	$pengalaman=pengalaman::all();
    	return view('admin.pengalaman',compact('pengalaman'));
    }
    public function homestay(){
        $homestay=homestay::all();
        return view('admin.homestay',compact('homestay'));
    }
}
