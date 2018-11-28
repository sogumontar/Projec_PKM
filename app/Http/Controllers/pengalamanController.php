<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

use App\pengalaman;

class pengalamanController extends Controller
{
    public function create(){
    	return view('pengalaman/create');
    }
    public function store(){
    	pengalaman::create([
    		'judul'=>Request('judul'),
    		'keterangan'=>Request('keterangan'),
    		'date'=>Request('date'),
    		'id_member'=>Request('id'),

    	]);
    	return redirect()->route('pengalaman.view');
    }
    public function  view(){
    	$pengalaman=pengalaman::all();
    	return view('pengalaman.view',compact('pengalaman'));
    }
}
