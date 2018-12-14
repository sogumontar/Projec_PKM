<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Auth;
use App\User;
use App\notifikasi;
use App\member;
use Session;

class userController extends Controller
{
    public function store(request $request)
    {
        $p1=request('password');
        
         $p2=request('confirmpassword');
         $test =request('mail');
          $hg=DB::SELECT("SELECT * FROM users where email='$test'");
        

        if($p1!=$p2){
            return view('/welcome')->with('danger','Password tidak sama, coba lagi');
        }else if($hg){
            return view('/welcome')->with('danger','email tersebut telah terdaftar coba email lain');
        }else{

             User::create([
            'name' => request('nama'),
            'email' => request('mail'),
            'password' => Hash::make(request('password')),
             'role'=>"member",
        ]);
             $q=DB::select('select id from users order by id desc');
              
                member::create([
                'nama'=> request('nama'),
                'alamat'=>request('alamat'),
                'no_telepon'=>request('notelp'),
                'id_akun'=> $q[0]->id,

                ]);
                 notifikasi::create([
           'nama'=>'Reject',
           'isi'=>'Request Pesanan Ditolak',
           'status'=>'sukses',
           'id_penerima'=>$q[0]->id,
           ]);
                   notifikasi::create([
           'nama'=>'Reject',
           'isi'=>'Request Pesanan Ditolak',
           'status'=>'sukses',
           'id_penerima'=>$q[0]->id,
           ]);
                     notifikasi::create([
           'nama'=>'Reject',
           'isi'=>'Request Pesanan Ditolak',
           'status'=>'sukses',
           'id_penerima'=>$q[0]->id,
           ]);

            }

      
         return view('/welcome')->with('success','Register berhasil');
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
