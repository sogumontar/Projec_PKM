<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $homestay = DB::SELECT("select * from users order by id DESC");
        // $test=compact('homestay');
         // print_r($homestay[0]->id);
       
        // if($homestay){
            $test=$homestay[0]->id+1;
        // }else{
        //     $test=1;
        // }

            echo $test;

        $home= DB::insert('insert into users(id,name,email,password) values(?,?,?,?)',[$homestay[0]->id+1,$data['name'],$data['email'],md5($data['password'])]);
        // echo $home;
        
     $member= DB::insert('insert into member(nama,id_akun) values(?,?)',[$data['name'],$homestay[0]->id+1]);
        die(); 
        $result = mysqli_multi_query($home, $member);

         // DB::insert('insert into member(nama,id_akun) values(?,?)',[$data['nama'],[$homestay[0]]]);
        
        // var_dump($homestay);
        // var_dump($member);
        // die();
        // return Member::create([
        //     'nama' => $data['name'],
        //     'id_akun' => $homestay[0]->id,
        // ]);
    }
}
