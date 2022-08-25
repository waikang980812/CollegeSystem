@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Info</div>

                <div class="card-body">
	<h3>Name: &nbsp;&nbsp;<b>{{$userinfo->users->name}}</b></h3>
	<h3>User ID: &nbsp;&nbsp;<b>{{$userinfo->users->id}}</b></h3>
	<h3>Birthday: &nbsp;&nbsp;<b>{{$userinfo->birth_date}}</b></h3>
	<h3>E-Mail: &nbsp;&nbsp;<b>{{$userinfo->users->email}}</b></h3>
	<h3>Contact Number: &nbsp;&nbsp;<b>{{$userinfo->contact_no}}</b></h3>
	<h3>Gender: &nbsp;&nbsp;<b>{{$userinfo->gender}}</b></h3>
	<h3>Address: &nbsp;&nbsp;<b>{{$userinfo->address}}</b></h3>
	<h3>Role: &nbsp;&nbsp;<b>{{$userinfo->users->roles->title}}</b></h3>
	<a href="{{$userinfo->id}}/edit">Edit User Profile</a>
  </div>
            </div>
        </div>
    </div>
</div>
@endsection