<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\objekWisata;
class objekWisataController extends Controller
{
    public function create(){
    	return view('objekWisata.create');
    }
    public function store(Request $request){
    	$file=$request->file('gambar');
    	$path=$request->file('gambar')->store('');
    	$request->file('gambar')->move('objekwisata',$path);
        echo request('lokasi');
        
    	objekWisata::create([
    		'nama'=>request('nama'),
    		'keterangan'=>request('keterangan'),
            'lokasi'=>request('lokasi'),
            'daerah'=>request('kecamatan'),
    		'gambar'=>$path,
    	]);
    	return redirect()->route('admin.objekWisata');

    }
    public function view(){
    	$test=objekWisata::all();
    	return view('objekwisata.view',compact('test'));
    }
    public function delete($id){
    	$a =DB::delete("delete from objekwisata where id=$id");
    	return view('admin.objekwisata');
    }
     public function destroy($id){
        // $objekwisata->delete();
        $d= DB::DELETE("delete from objek_wisata where id=$id");
       
            return redirect()->route('admin.objekWisata')->with('success','Objek Wisata berhasil di delete');
       
    }
    public function edit($id){
        $dd=objekwisata::find($id);
        if(Auth::user()->role=='owner'){
        return view('objekwisata.edit',compact('dd')); 
    }else{
         return view('admin.edit_obj',compact('dd')); 
    }
    }
    public function update(Request $request,$id){



        $objekwisata =objekWisata::find($id);



        // if(!$request->file('gambar')){
        //     if(file_exists($request->file('gambar')->move(getcwd() . '/homestay/img/' . $homestay->gambar)))
        //     {
        //             unlink($request->file('gambar')->move(getcwd() . '/homestay/img/' . $homestay->gambar));
        //     }
        // }
        
        $r=request('gambar');
        if($r==''){
           
        $objekwisata->update([
            'nama'=>request('nama'),
            'keterangan'=>request('keterangan'),
            'lokasi'=>request('lokasi'),
           
        ]); }else{

        $gambar = $request->file('gambar');
         $namaFile = $gambar->getClientOriginalName();
         $pathw= $request->file('gambar')->store(''); 
         $request->file('gambar')->move('objekwisata',$pathw);

          $objekwisata->update([
            'nama'=>request('nama'),
            'keterangan'=>request('keterangan'),
            'lokasi'=>request('lokasi'),
            'gambar'=>$pathw,
        ]);

        }
        if(Auth::user()->role=='admin'){
            
            return redirect()->route('admin.objekWisata');
        }else{
            return redirect()->route('owner.objekwisata');
        }

    }
}
