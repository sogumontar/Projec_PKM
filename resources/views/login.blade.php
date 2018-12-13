@extends('welcome')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<br>
<br>
	<div class="container">
		<form action="{{route('user.login')}}" method="post">
			<input class="form-control" type="email" name="email" placeholder="email" id="email"><br>
			<input class="form-control" type="password" name="password" placeholder="password" id="password"><br>
			<input type="submit" class="btn btn-info" name="" value="enter">
			<input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
		</form>
	</div>
