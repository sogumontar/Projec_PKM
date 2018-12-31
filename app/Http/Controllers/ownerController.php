<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ownerController extends Controller
{
	public function terimaUang(){
		if(Auth::user()){
			$id=Auth::user()->id;
			$DB=DB::SELECT("SELECT * FROM bayarpemilik where id_pemilik=$id");
			return view('owner/terimaUang',compact('DB'));
		}
	}
	public function terima($id){
		$DB=DB::UPDATE("UPDATE bayarpemilik set status='Finish' where id=$id");
		return redirect('owner/terimaUang')->with('success','Terima Uang Sukses');
	}
}
