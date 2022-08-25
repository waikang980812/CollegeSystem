@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Role Info</div>

                <div class="card-body">
<h1 class="title">Create Role</h1>
<form method="POST" action="/roles" >
	@csrf
	<div class="field">
  <label class="label">Role Title</label>
	<div class="control">
		<input class ="input @error('title') input is-danger @enderror" type="text" name="title" placeholder="Role Title">
		@error('title')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	</div>
	</div>
	<div class="field">
  <label class="label">Role Description</label>
  <div class="control">
		<textarea name="description" placeholder="Role description" class="textarea @error('description') input is-danger @enderror"></textarea>
		@error('description')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
	</div>
	</div>
	<div>
		<button type="submit" class="button is-primary">Create Role</button>
	</div>
</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection