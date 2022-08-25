@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Faculty</div>

                <div class="card-body">
<form method="POST" action="/faculty" >
	@csrf
	<div class="field">
  <label class="label">Faculty name</label>
	<div class="control">
		<input class ="input @error('name') input is-danger @enderror" type="text" name="name" placeholder="Faculty Name">
		@error('name')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	</div>
	</div>
	<div class="field">
  <label class="label">Faculty Description</label>
  <div class="control">
							<textarea name="description" placeholder="Faculty description" class="textarea @error('description') input is-danger @enderror"></textarea>
							@error('description')
           					 <p class="help is-danger">{{ $message }}</p>
       						 @enderror
						</div>
					</div>
					<div>
						<button type="submit" class="button is-primary">Create Faculty</button>
					</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection