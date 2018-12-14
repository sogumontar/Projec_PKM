<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\pengalaman;
use App\homestay;
use App\kendaraan;
use App\pemilik;
use App\objekWisata;
use App\record_homestay;
use App\notifikasi;
class adminController extends Controller
{
    public function objekWisata(){
        $objekWisata=objekWisata::all();
    	return view('admin.objekWisata',compact('objekWisata'));
    }
    public function akun(){
    	$akun=user::all();
    	return view('admin.akun',compact('akun'));
    }
    public function pengalaman(){
    	$pengalaman=pengalaman::all();
    	return view('admin.pengalaman',compact('pengalaman'));
    }
    
    public function kendaraan(){
        $kendaraan=kendaraan::all();
        // $pemilik=pemilik::all();
        // print_r($kendaraan[0]->id_pemilik);
        // // die();
        // $pemilik = DB::select("select k.jenis_kendaraan , k.Merk_kendaraan , k.plat_nomor from kendaraan k 
        //     // inner join pemilik_homestay_kendaraan p on p.id=k.id_pemilik'");
        $query = DB::table('kendaraan')
           ->join('pemilik_homestay_kendaraan', 'kendaraan.id_pemilik', '=', 'pemilik_homestay_kendaraan.id_akun')
           ->select('kendaraan.jenis_kendaraan', 'kendaraan.Merk_kendaraan', 'kendaraan.plat_nomor','kendaraan.id', 'pemilik_homestay_kendaraan.nama')
           ->get();
           $idd=Auth::user()->id;
           notifikasi::create([
           'nama'=>'menambahkan',
           'isi'=>'Berhasil menambahkan kendaraan',
           'status'=>'sukses',
           'id_penerima'=>$idd,
           ]);

        return view('admin.kendaraan',compact('query'));


    }
    public function homestay(){
         $query = DB::table('homestay')
           ->join('pemilik_homestay_kendaraan', 'homestay.id_pemilik', '=', 'pemilik_homestay_kendaraan.id_akun')
           ->select('homestay.nama', 'homestay.keterangan', 'homestay.gambar','homestay.id', 'pemilik_homestay_kendaraan.nama as name')
           ->get();
           return view('admin.homestay',compact('query'));
    }
    public function request(){
        $test=DB::select('select * from record_pemesanan_homestay');
        $test1=DB::select('select * from record_pemesanan_kendaraan');


        return view('admin.request',compact('test','test1'));
    }
    public function accept($id){
        $i=0;
        $DB=DB::select("SELECT * FROM record_pemesanan_homestay");

           $nowwo=date("Y-m-d");
        $wonnee=strtotime($nowwo);
        foreach ($DB as $d ) {
           $RE=DB::SELECT("SELECT * FROM homestay where id=$d->id_homestay");
                $rey=$RE[0]->id;
                $qwe =$RE[0]->jumlah_booking;
                $ewq =$d->jumlah_kamar;
                $ress=$qwe-$ewq;
                echo $ress;
                $rr=strtotime($d->date);
               

                if($wonnee>$rr){
                    $TR=DB::UPDATE("UPDATE homestay set jumlah_kamar_terbooking=$ress where id=$rey");
                    $tt=DB::UPDATE("UPDATE record_pemesanan_homestay set jumlah_kamar=0 where id=$d->id");
                    var_dump($TR);
                }
              
                $i++;
        }
          
        $qqe=DB::SELECT("SELECT * FROM record_pemesanan_homestay where id=$id");
        $dsaq=$qqe[0]->id_member;
         notifikasi::create([
           'nama'=>'accept',
           'isi'=>'Request Pesanan Diterima',
           'status'=>'sukses',
           'id_penerima'=>$dsaq,
           ]);

        $test= DB::update("update record_pemesanan_homestay set status='accepted' where id=$id");
        return redirect()->route('admin.request')->with('success','Process Berhasil');
    }
    public function reject($id){

       $i=0;
        $DB=DB::select("SELECT * FROM record_pemesanan_homestay");

           $nowwo=date("Y-m-d");
        $wonnee=strtotime($nowwo);
        foreach ($DB as $d ) {
           $RE=DB::SELECT("SELECT * FROM homestay where id=$d->id_homestay");
                $rey=$RE[0]->id;
                $qwe =$RE[0]->jumlah_booking;
                $ewq =$d->jumlah_kamar;
                $ress=$qwe-$ewq;
                echo $ress;
                $rr=strtotime($d->date);
               

                if($wonnee>$rr){
                    $TR=DB::UPDATE("UPDATE homestay set jumlah_kamar_terbooking=$ress where id=$rey");
                    $tt=DB::UPDATE("UPDATE record_pemesanan_homestay set jumlah_kamar=0 where id=$d->id");
                    var_dump($TR);
                }
              
                $i++;
        }
         $qqe=DB::SELECT("SELECT * FROM record_pemesanan_homestay where id=$id");
        $dsaq=$qqe[0]->id_member;
         notifikasi::create([
           'nama'=>'Reject',
           'isi'=>'Request Pesanan Ditolak',
           'status'=>'sukses',
           'id_penerima'=>$dsaq,
           ]);
          




        $test= DB::update("update record_pemesanan_homestay set status='rejected' where id=$id");
        return redirect()->route('admin.request')->with('danger','Process Berhasil');
    }
}
