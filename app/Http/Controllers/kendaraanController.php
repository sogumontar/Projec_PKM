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
}
