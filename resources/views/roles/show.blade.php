@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Role Info</div>

                <div class="card-body">
	<h1>Role Title: <b>{{$roles->title}}</b></h1>
	<h2>Description: <b>{{$roles->description}}</b></h2>
<p>
	<a href="/roles/{{$roles->id}}/edit">Edit</a>
</p>
<br>
<br>
<h1><u>Edit Permissions</u></h1>
<div>
	<form action="/permissions/{{$roles->permissions->id}}" method="POST">
		@method('PATCH')
		@csrf
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="permissions_checkbox[]" value="manageUser" onChange="this.form.submit()" {{$roles->permissions->manageUser ? 'checked':''}}>
			Manage User Permission
		</label>
		</div>
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="permissions_checkbox[]" value="manageFacul" onChange="this.form.submit()" {{$roles->permissions->manageFacul ? 'checked':''}}>
			Manage Faculty Permission
		</label>
		</div>
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="permissions_checkbox[]" value="manageProg" onChange="this.form.submit()" {{$roles->permissions->manageProg ? 'checked':''}}>
			Manage Programmes Permission
		</label>
	</div>
	</form>
</div>
 </div>
            </div>
        </div>
    </div>
</div>
@endsection