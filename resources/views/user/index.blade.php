@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">

@foreach ($userinfo as $userinfo)
	
		<li>
			<a href="/userinfo/{{$userinfo->id}}">
			 {{$userinfo->users->name}}
			</a>
		</li>
	
@endforeach
  </div>
            </div>
        </div>
    </div>
</div>
@endsection