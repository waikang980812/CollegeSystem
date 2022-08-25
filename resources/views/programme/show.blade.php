@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programme Information</div>

                <div class="card-body">
                	<h2>Programme Name: {{$programme->name}}</h2>
					<h2>Description: {{$programme->description}}</h2>
					<h2>Minimum Entry Requirement: {{$programme->mer}}</h2>
					<h2>Course Info: {{$programme->courseinfo}}</h2>
					<h2>Duration Of Study (Year):{{$programme->duration}}</h2>
					<a href="/programme/{{$programme->id}}/edit">Edit</a>
					<br><br>
					<u><h2>Campus Offered</h2></u>
<div>
	<form action="/campus/{{$programme->campus->id}}" method="POST">
		@method('PATCH')
		@csrf
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="kl" onChange="this.form.submit()" {{$programme->campus->kl ? 'checked':''}}>
			Kuala Lumpur
		</label>
		</div>
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="johor" onChange="this.form.submit()" {{$programme->campus->johor ? 'checked':''}}>
			Johor
		</label>
		</div>
		<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="penang" onChange="this.form.submit()" {{$programme->campus->penang ? 'checked':''}}>
			Penang
		</label>
	</div>
	<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="sabah" onChange="this.form.submit()" {{$programme->campus->sabah ? 'checked':''}}>
			Sabah
		</label>
	</div>
	<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="perak" onChange="this.form.submit()" {{$programme->campus->perak ? 'checked':''}}>
			Perak
		</label>
	</div>
	<div>
		<label for="enabled" class="checkbox">
			<input type="checkbox" name="campus_checkbox[]" value="pahang" onChange="this.form.submit()" {{$programme->campus->pahang ? 'checked':''}}>
			Pahang
		</label>
	</div>
	</form>
</div>
					<br><br>
					<u><h2>Programme Structure</h2></u>

					@php
						$structure = $programme->programmeStructures;
					@endphp
					@foreach ($structure as $structure)
					<p>{{$structure->subject}}   <a href="{{  route('delete-structure', ['id' => $structure->id]) }}" >Delete</a></p>
					@endforeach
					<br><br>

					<form method="POST" action="/programmestructure">
						@csrf
						<input type="hidden" name="programmes_id" value="{{$programme->id}}">
						<div class="field">
						  <label class="label">Add Programme Stucture</label>
						  <div class="control">
						    <input class="input" type="text" name="subject" placeholder="Subject">
						  </div>
						  <button type="submit" class="button is-primary">Add Subject</button>
						</div>
					</form>
					<a href="/faculty/{{$programme->faculties->id}}">Back</a>
 				</div>
            </div>
        </div>
    </div>
</div>
@endsection