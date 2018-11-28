@extends('layouts.app')
<br>
<br>
	<div class="container">
		<form action="{{route('user.register')}}" method="post">
			<input class="form-control" type="text" name="nama" placeholder="nama" id="nama"><br>
			<input class="form-control" type="email" name="email" placeholder="email" id="email"><br>
			<input class="form-control" type="password" name="password" placeholder="password" id="password"><br>
			<select class="form-control" name="role">
				<option value="-">Role</option>
				<option value="admin">Admin</option>
				<option value="member">Member</option>
				<option value="owner">Owner Homestay</option>
				
			</select>
			<br><br><br>
			<input type="submit" class="btn btn-info" name="">
			<input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
		</form>
	</div>
