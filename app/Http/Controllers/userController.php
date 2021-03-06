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
use Mail;
class userController extends Controller
{

  public function store(request $request)
  {  $connected = @fsockopen("www.google.com", 80); 
                                          //website, port  (try 80 or 443)
      if ($connected){
          $is_conn = true; //action when connected
          fclose($connected);
        }else{
          $is_conn = false; //action in connection failure
        }
    if($connected){
    

      $p1=request('password');

      $p2=request('confirmpassword');
      $test =request('mail');
      $hg=DB::SELECT("SELECT * FROM users where email='$test'");
      

      if($p1!=$p2){
        return redirect()->route('homestay.view')->with('danger','Password tidak sama, coba lagi');
      }else if($hg){
        return redirect()->route('homestay.view')->with('danger','Gmail tersebut sudah terdaftar, coba lagi');
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

      
     
      
        echo 'dol';
        try{
          Mail::send('email', ['nama' => request('nama'), 'pesan' => "Terimakasih telah memberikan kepercayaan kepada kami, karena telah menggunakan website ini.Semoga Applikasi ini dapat membantu anda dalam mencaari penginapan sekitar daerah Toba Samosir"], function ($message) use ($request)
          {
            $message->subject("Registrasi Berhasil");
            $message->from('homestayhotsa@gmail.com', 'KingStay');
            $message->to($request['mail']);

          });

        }
        catch (Exception $e){
          
        }

    }else{
      return redirect()->route('user.register')->with('danger','Koneksi Anda Bermasalah');
    }
    
    return view('/welcome')->with('success','Register berhasil');
  }
  public function reg(){
    return view('/reg');

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
     return back()->with('success','Login Berhasil');

  }else{
return back()->with('danger','Login Gagal');
  }


}
public function logout(request $request){
  $request->session()->regenerate();
        // return redirect()->route('welcome');
  echo "logout";
}

}
