<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function store(request $request){
    	$nama=$request->input('nama');
    	$email=$request->input('email');
    	$password=$request->input('password');

    	 DB::insert('insert into users(name,email,password) values(?,?,?)',[$nama,$email,md5($password)]);

            return redirect()->route('homestay.view');
    }
    public function reg(){
            return view('user.register');

    }
    public function login(request $request){
    	
    	// print_r($request->input());
    	// return false;
    	$email=$request->input('email');
    	$password=$request->input('password');

    	$config= DB::select('select id from users where email=? AND password=?',[$email,md5($password)]);

    	if(count($config)){
            echo "del";
    		// return redirect()->route('welcome')->with('succes','succes');
    	}else{
            echo "salah";
    		// return redirect()->route('welcome')->with('danger','gagal');
    	}

    }
     public function logout(request $request){
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
}
