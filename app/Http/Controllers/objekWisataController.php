<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

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
    	objekWisata::create([
    		'nama'=>request('nama'),
    		'keterangan'=>request('keterangan'),
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
}
