@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Faculty Information</div>

                <div class="card-body">
                	<h2>Faculty Name: {{$faculty->name}}</h2>
					<h2>Description: {{$faculty->description}}</h2>
					@php
						$programme = $faculty->programmes;
					@endphp
					<br><br>
					<u><h2>Programme List</h2></u>
					@foreach ($programme as $programme)
					<li>
						<a href="/programme/{{$programme->id}}">
							{{$programme->name}}
						</a>
					</li>
					@endforeach
					<br>
					<a href="/programme/create/{{$faculty->id}}">Add Programme To Faculty</a>
 				</div>
            </div>
        </div>
    </div>
</div>
@endsection