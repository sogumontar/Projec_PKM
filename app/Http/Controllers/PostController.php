<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
class PostController extends Controller
{
	public function create(){
		return view('post.create');
	}
	public function store(){
		Post::create([
			'title'=>request('title'),
			'content'=>request('content')
		]);
	}
	public function sendEmail(Request $request)
	{
		try{
			Mail::send('email', ['nama' => "hendra", 'pesan' => "pesan"], function ($message) use ($request)
			{
				$message->subject("Judul");
				$message->from('homestayhotsa@gmail.com', 'KingStay');
				$message->to('hendrasimz92243768986543@gmail.com');
			});
			return back()->with('alert-success','Berhasil Kirim Email');
		}
		catch (Exception $e){
			return response (['status' => false,'errors' => $e->getMessage()]);
		}
	}
}
