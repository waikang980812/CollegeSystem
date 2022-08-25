@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Faculty</div>

                <div class="card-body">

	@foreach ($faculty as $faculty)
	
		<li>
			<a href="/faculty/{{$faculty->id}}">
			 {{$faculty->name}}
			</a>
		</li>
	
@endforeach
 </div>
            </div>
        </div>
    </div>
</div>
@endsection