<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\homestay;
use App\fasilitas;
use App\sementara;
use App\promo;
use App\gbrHomestay;

use App\record_homestay;
class homestayController extends Controller
{

    public function create(){
    	return view('homestay.create');
    }
    public function store(Request $request){

        

    
    $file       = $request->file('gambar');
    $fileName   = $file->getClientOriginalName();
            // $request->file('gambar')->move("upload/",$fileName);
        	// $gambar = $request->file('gambar');
    $gambar = $request->file('gambar');
             // $namaFile = $gambar->getClientOriginalName();
    $pathw= $request->file('gambar')->store(''); 
    $request->file('gambar')->move('uploadgambar',$pathw);

    $fdf=request('harga');
    $ret=10;
    if($fdf>=750000){
        $ret=750;
    }else if($fdf>=500000){
        $ret=500;
    }else if($fdf>=250000){
        $ret=250;
    }else if($fdf>=100000){
        $ret=100;
    }else if($fdf>=50000){
        $ret=50;
    }

    $a=Auth::user()->id;
    homestay::create([
        'nomor_kamar'=>request('jumlah'),
        'id_pemilik'=>$a,
        'harga'=>request('harga'),
        'keterangan'=>request('keterangan'),
        'nama'=>request('nama'),
        'gambar'=>$pathw,
        'kecamatan'=>request('kecamatan'),
        'alamat'=>request('alamat'),
        'poin'=>$ret,

    ]);

     //    echo $path;
      //       $path= $request->file('gambar')->store('upload');
    		// $nomor_kamar=$request->input('nomor_kamar');
    		// $id_pemilik=$request->input('id_pemilik');
      //       $harga=$request->input('harga');
      //       $keterangan=$request->input('keterangan');
      //       $nama=$request->input('nama');
      //       $gambarr=$request->input('gambar');


        // $namaFile = $gambar->getClientOriginalName();
        // $request->file('gambar')->move('upload',$fileName);
        // $do = new Gambar($request->all());
        // $do->gambar=$namaFile;
        // $do->save();
    $rt=DB::select('select * from homestay order by id desc');
             // echo $rt[0]->id;
    $a=request(['check'][0]);
             // echo $a[1];
    $i=0;
    echo $a[0];
    foreach (request(['check'][0]) as $b){
        fasilitas::create([
            'id_homestay'=>$rt[0]->id,
            'nama'=>$a[$i],
            'Keterangan'=>$a[$i],
        ]);
        $i++;
    }




           // echo  DB::insert('insert into homestay(nomor_kamar,id_pemilik,harga,keterangan,nama,gambar) values(?,?,?,?,?,?)',[$nomor_kamar,$id_pemilik,$harga,$keterangan,$nama,$gambarr]);
$yyt=DB::SELECT("SELECT * FROM homestay ORDER BY id desc");
echo $tty=$yyt[0]->id;
    if(count($_FILES['file']['name'])) {
            if ($request->hasFile('file')) {
                $destinationPath = 'tests';
            $files = $request->file('file'); // will get all files
            $i=0;
            foreach ($files as $file) {//this statement will loop through all files.
                $file_name = $file->getClientOriginalName(); //Get file original name
                $test=explode(".", $_FILES['file']['name'][$i]);
                $newName=round(microtime(true)) . '.' . end($test); 
                $file->move($destinationPath , $newName); // move files to destination folder
                $i++;
                $a=Auth::user()->id;
                $oow=date('d-m-Y');
                $kjashkjd=Auth::user()->id;

                $eewqwe=gbrHomestay::create([
                    'nama'=>$newName,
                    'id_homestay'=>$tty,
                    'date'=>$oow,
                    'id_pemilik'=>$kjashkjd,

                ]);
                
                }
            }
        }

    return redirect()->route('owner.homestay')->with('success','Homestay Berhasil Ditambahkan');
}

public function view(){
    $homestay =DB::table('homestay')->paginate(6);


    return view('homestay.view',compact('homestay'));
}
public function edit($id){
    $homestay =homestay::find($id);
    return view('homestay.edit',compact('homestay'));
}
public function new(){
    return view('admin.new');
}
public function kelola($id){
    $record =record_homestay::find($id);
    return view('homestay.kelola',compact('record'));
}
public function update(Request $request,$id){



    $homestay =homestay::find($id);



        // if(!$request->file('gambar')){
        //     if(file_exists($request->file('gambar')->move(getcwd() . '/homestay/img/' . $homestay->gambar)))
        //     {
        //             unlink($request->file('gambar')->move(getcwd() . '/homestay/img/' . $homestay->gambar));
        //     }
        // }

    $r=request('gambar');
    if($r==''){

        $homestay->update([
            'nomor_kamar'=>request('nomor_kamar'),
            'id_pemilik'=>request('id_pemilik'),
            'harga'=>request('harga'),
            'keterangan'=>request('keterangan'),
            'nama'=>request('nama'),
        ]); }else{

            $gambar = $request->file('gambar');
            $namaFile = $gambar->getClientOriginalName();
            $pathw= $request->file('gambar')->store(''); 
            $request->file('gambar')->move('uploadgambar',$pathw);

            $homestay->update([
                'gambar'=>$pathw,
            ]);

        }

        return redirect()->route('owner.homestay');

    }
    public function destroy(homestay $homestay){
     echo $homestay->id;

     $a=DB::delete("delete  from fasilitas where id_homestay=$homestay->id");
     $b=DB::delete("delete from record_pemesanan_homestay where id_homestay=$homestay->id");
     $homestay->delete();
     if(Auth::user()->role=='owner'){
        return redirect()->route('owner.homestay');

    }else{
        return redirect()->route('admin.homestay');
    }
}
public function search(request $request){
    $ag=request('lokasi');

        // $b=request('waktu_awal');
        // $c=request('waktu_akhir');
        // $d=strtotime($b);

        // echo $b;

    $ee=DB::select("SELECT * from record_pemesanan_homestay");
    $i=0;



    $ghgh=DB::SELECT("SELECT * from homestay");
    echo $ag;

    $trtr=$ghgh[$i]->kecamatan;
    $tes=DB::select("SELECT * from  homestay where kecamatan like '%$ag%'");



    return view('homestay.search',compact('ag','qq','tes','d'));
}
public function booking($id){
    $homestay =DB::SELECT("SELECT * FROM record_pemesanan_homestay INNER JOIN homestay where record_pemesanan_homestay.id_homestay=homestay.id");

    if(Auth::user()){

        return view('homestay.booking',compact('homestay','id'));
    }else{

       return redirect()->route('homestay.view')->with('danger','Untuk mengakses halaman tersebut, anda harus login terlebih dahulu');
   }
}


public function bookProcess(request $request,$id){
        // echo $id;
        // die();
    $test=DB::SELECT("select * from homestay where id=$id ");
        // echo $test[0]->nomor_kamar;
    $nowwo=date("Y-m-d");
    $wonnee=strtotime($nowwo);
    $oww=date('H:i:s');
    $wonne=$wonnee+strtotime($oww);
    $inow = strtotime(request('date'));
    $o=DB::select("select * from homestay where id=$id");
    $g=$test[0]->jumlah_kamar_terbooking+request('jumlah');







        // echo $test[0]->nomor_kamar;
    if($wonnee>$inow){
        return redirect()->route('homestay.view')->with('danger','Tanggal yang anda masukkan sudah lewat pilih tanggal hari ini atau hari berikutnya');
    }else if($test[0]->nomor_kamar <= request('jumlah')){
       return redirect()->route('homestay.view')->with('danger','jumlah kamar tidak mencukupi');
       echo "Jumlah kamar tidak mencukupi";

   }else if($test[0]->nomor_kamar-$o[0]->jumlah_kamar_terbooking<request('jumlah')){
    return redirect()->route('homestay.view')->with('danger','jumlah kamar yang tersedia tidak memenuhi');


}else{
    $klk=DB::SELECT("SELECT * FROM promo where id_homestay=$id");

    if($klk){

        record_homestay::create([
            'id_member'=>Auth::user()->id,
            'id_homestay'=>$id,
            'date'=>request('date'),
            'jumlah_kamar'=>request('jumlah'),
            'status'=>'pending',
            'jumlah_pengunjung'=>request('jumlah_pengunjung'),
            'harga'=>request('jumlah')*$klk[0]->harga*request('lama'),
            'lama_menginap'=>request('lama'),

                // 'nomor_kamar'=>request('nomor_kamar'),
        ]);

    }else{

        record_homestay::create([
            'id_member'=>Auth::user()->id,
            'id_homestay'=>$id,
            'date'=>request('date'),
            'jumlah_kamar'=>request('jumlah'),
            'status'=>'pending',
            'jumlah_pengunjung'=>request('jumlah_pengunjung'),
            'harga'=>request('jumlah')*$test[0]->harga*request('lama'),
            'lama_menginap'=>request('lama'),

                // 'nomor_kamar'=>request('nomor_kamar'),
        ]);
    }
    $g=$test[0]->jumlah_kamar_terbooking+request('jumlah');

    $dell=DB::SELECT("SELECT * FROM homestay where id=$id");
    $led=$dell[0]->pembooking;
    $ll=$led+1;
    $hl=DB::update("update homestay set jumlah_kamar_terbooking=$g , pembooking=$ll where id=$id");
    echo $g;


}
return redirect()->route('homestay.view')->with('success','Booking berhasil');
}
public function listBook(){
    $record_homestay = DB::SELECT("select * from record_pemesanan_homestay");
    return view('homestay.listBook',compact('record_homestay'));
}
public function rejectBooking($id){
    $record_homestay1 =record_homestay::find($id);
    $record_homestay1->update([
            // 'id_member'=>Request('id_member'),
            // 'id_homestay'=>Request('id_homestay'),
            // 'date'=>request('date'),
            // 'jumlah_kamar'=>request('jumlah_kamar'),
        'status'=>'reject',
            // 'jumlah_pengunjung'=>request('jumlah_pengunjung'),
            // 'nomor_kamar'=>request('nomor_kamar'),
    ]); 
    return redirect()->route('listBook')->with('succes','berhasil');
}
public function acceptBooking($id){
    $record_homestay =record_homestay::find($id);
    $record_homestay->update([

        'status'=>'accept',

    ]); 
    return redirect()->route('listBook');
}
public function kendaraan(request $request,$id){
    sementara::create([
        'tipe'=>request('tipe'),
        'id_member'=>Auth::user()->id,
        'date'=>date("Y-m-d"),
        'status'=>'pending',
    ]);
    die();
    return redirect()->route('homestay.view')->with('succes','berhasil');
}

public function keranjang(request $request,$id){
    $nowwo=date("Y-m-d");
    DB::insert("INSERT Into record_pemesanan_homestay('id_member','id_homestay','date','jumlah_kamar','status','jumlah_pengunjung','harga')
        VALUES (Auth::user()->id, $id, request('date'),request('jumlah_kamar'),'belum',request('jumlah_pengunjung'),request('jumlah_pengunjung'))");
    return redirect()->route('homestay.view');
}
public function rating(request $request,$id){
 $nowwo=date("Y-m-d");
 if(Auth::user()){
    $asd= Auth::user()->id;

    $test=DB::select("select * from rating where id_homestay=$id AND id_member=$asd");
    $r=request('jumlah');

    if($test!=0){
        $s=DB::select("select * from homestay where id=$id");
            // echo $s[0]->rating;
        $bb=$s[0]->rating+request('jumlah');
        $tr=$s[0]->jumlah_booking+1;
        $wo=request('review');

        $gg=DB::UPDATE("UPDATE homestay set rating=$bb,jumlah_booking=$tr where id=$id");
        $db=DB::insert("INSERT into rating(waktu,jumlah,id_member,id_homestay,review)VALUES('$nowwo',$r,$asd,$id,'$wo')");

        return redirect()->route('homestay.view')->with('success','Anda berhasil melakukan rating pada homestay ini');
    }
}
return redirect()->route('homestay.view');   
}

public function detail($id){
    $db=DB::select("select * from homestay where id=$id");

    return view('homestay.detail',compact('db','id'));
}
public function promo($id){
    return view('homestay.promo',compact('id'));
}
public function promoProcess(request $request,$id){

    $now=date("Y-m-d");
    $noww=strtotime($now);
    $awal=request('mulai');
    $akhir=request('selesai');
    $awal1=strtotime($awal);
    $akhir1=strtotime($akhir);
    if($akhir1<$awal1){
        return redirect('owner.homestay')->with('Danger',"Waktu berakhir promo tidak boleh lebih awal dari waktu mulai promo");
    }else if($noww>$awal1){
        return redirect('owner.homestay')->with('Danger',"Waktu tidak boleh yang sudah lewat");
    }else{
       promo::create([

        'nama'=>request('nama'),
        'harga'=>request('harga'),
        'mulai'=>request('mulai'),
        'selesai'=>request('selesai'),
        'status'=>'start',
        'id_homestay'=>$id,
        'keterangan'=>request('keterangan'),
    ]);
   }
   die();
   return redirect('owner.homestay')->with('succes',"Promo berhasil di tambahkan");
} 

}
