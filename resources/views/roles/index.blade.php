@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
<ul>
@foreach ($roles as $roles)
	
		<li>
			<a href="/roles/{{$roles->id}}">
			 {{$roles->title}}
			</a>
		</li>
	
@endforeach
</ul>
<br>
<br>
<u><a href=/roles/create>Create New Roles</a></u>
 </div>
            </div>
        </div>
    </div>
</div>
@endsection