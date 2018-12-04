<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Auth;
use App\User;
use App\member;
use Session;

class userController extends Controller
{
    public function store(request $request)
    {
             User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             'role'=>"member",
        ]);
             $q=DB::select('select id from users order by id desc');
              
                member::create([
                'nama'=> $request['name'],
                'id_akun'=> $q[0]->id,

                ]);

      
         return view('/welcome');
    }
    public function reg(){
            return view('reg');

    }
    public function login(request $request){
    	
    	// print_r($request->input());
    	// return false;
    	$email=$request->input('email');
    	$password=$request->input('password');

    	$config= DB::select('select id from users where email=? AND password=?',[$email,md5($password)]);

    	if(count($config)){
            // echo "del";
            Session::put('log',TRUE);
            return redirect()->route('homestay.view');
    		
    	}else{
            echo "salah";
    		// return redirect()->route('welcome')->with('danger','gagal');
    	}

        // dd(\Auth::attempt([]))

    }
     public function logout(request $request){
        $request->session()->regenerate();
        // return redirect()->route('welcome');
        echo "logout";
    }
}
