@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Role Info</div>

                <div class="card-body">
<form method="POST" action="/roles/{{ $roles->id}}">	
	@csrf
	@method('PATCH')
	<div class="field">
	  <label class="label">Title</label>
	  <div class="control">
	    <input class="input @error('title') input is-danger @enderror" type="text" name="title" placeholder="Role Title" value="{{ $roles->title}}">
	    @error('title')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	  </div>
	  
	</div>
	<textarea class="textarea @error('description') input is-danger @enderror" name="description">{{ $roles->description }}</textarea>
	@error('description')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
	<div class="control">
	  <button class="button is-primary">Edit Role</button>
	</div>
</form>
<form method="POST" action="/roles/{{$roles->id}}">
	@method('DELETE')
	@csrf
<div class="control">
  <button class="button is-primary">Delete</button>
</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection