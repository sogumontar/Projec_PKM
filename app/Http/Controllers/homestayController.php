<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\homestay;

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
         $a=Auth::user()->id;
            homestay::create([
            'nomor_kamar'=>request('nomor_kamar'),
            'id_pemilik'=>$a,
            'harga'=>request('harga'),
            'keterangan'=>request('keterangan'),
            'nama'=>request('nama'),
            'gambar'=>$pathw,

        ]);

           // echo  DB::insert('insert into homestay(nomor_kamar,id_pemilik,harga,keterangan,nama,gambar) values(?,?,?,?,?,?)',[$nomor_kamar,$id_pemilik,$harga,$keterangan,$nama,$gambarr]);
        
    	return redirect()->route('owner.homestay');
    }

    public function view(){
        $homestay =homestay::all();
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
        $homestay->delete();
        if(Auth::user()->role=='owner'){
            return redirect()->route('owner.homestay');

        }else{
            return redirect()->route('admin.homestay');
        }
    }
    public function search(){
        
        $homestay = DB::SELECT("select * from homestay order by keterangan DESC");
        return view('homestay.search',compact('homestay'));
    }
    public function booking($id){
        $homestay =homestay::find($id);
        return view('homestay.booking',compact('homestay'));
    }


    public function bookProcess(request $request,$id){
        // echo $id;
        // die();
        $test=DB::SELECT("select * from homestay where id=$id");
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
            record_homestay::create([
                'id_member'=>Auth::user()->id,
                'id_homestay'=>$id,
                'date'=>request('date'),
                'jumlah_kamar'=>request('jumlah'),
                'status'=>'pending',
                'jumlah_pengunjung'=>request('jumlah_pengunjung'),
                // 'nomor_kamar'=>request('nomor_kamar'),
            ]);
            DB::update("update homestay set jumlah_kamar_terbooking=$g where id=$id");

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
    // public function rejectBooking($id){
    //     $record_homestay=record_homestay::find($id);
    //     $record_homestay->update([
    //         'id_member'=>'1',
    //         'id_homestay'=>'35',
    //         'date'=>request('date'),
    //         'jumlah_kamar'=>request('jumlah_kamar'),
    //         'status'=>'reject',
    //         'jumlah_pengunjung'=>request('jumlah_pengunjung'),
    //         'nomor_kamar'=>'1',
    //     ]);
    //     echo "del";     
    // }

    // public function acceptBooking($id){
    //     $record=record_homestay::find($id);
    //     $record->update([
    //         'id_member'=>'1',
    //         'id_homestay'=>'35',
    //         'date'=>request('date'),
    //         'jumlah_kamar'=>request('jumlah_kamar'),
    //         'status'=>'accept',
    //         'jumlah_pengunjung'=>request('jumlah_pengunjung'),
    //         'nomor_kamar'=>'1',
    //     ]);
    //     echo "del";
    // }

}
