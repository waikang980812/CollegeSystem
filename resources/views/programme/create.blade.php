@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Programme</div>

                <div class="card-body">
					<form method="POST" action="/programme" >
						@csrf
						<input type="hidden" name="faculties_id" value="{{$id}}">
						<div class="field">
  							<label class="label">Programme name</label>
								<div class="control">
									<input class ="input @error('name') input is-danger @enderror" type="text" name="name" placeholder="Programme Name">
									@error('name')
             						<p class="help is-danger">{{ $message }}</p>
        							@enderror
								</div>
						</div>
						<div class="field">
  								<label class="label">Programme Description</label>
  							<div class="control">
							<textarea name="description" placeholder="Programme description" class="textarea @error('description') input is-danger @enderror"></textarea>
							@error('description')
           					 <p class="help is-danger">{{ $message }}</p>
       						 @enderror
							</div>
						</div>
						<div class="field">
  							<label class="label">Minimum Entry Requirement (MER) </label>
								<div class="control">
									<input class ="input @error('mer') input is-danger @enderror" type="text" name="mer" placeholder="Minimum Entry Requirement">
									@error('mer')
             						<p class="help is-danger">{{ $message }}</p>
        							@enderror
								</div>
						</div>
						<div class="field">
  							<label class="label">Course Information </label>
								<div class="control">
									<input class ="input @error('courseinfo') input is-danger @enderror" type="text" name="courseinfo" placeholder="Course Information">
									@error('courseinfo')
             						<p class="help is-danger">{{ $message }}</p>
        							@enderror
								</div>
						</div>
						<div class="field">
  							<label class="label">Duration of Study (Year(s)) </label>
								<div class="control">
									<input class ="input @error('duration') input is-danger @enderror" type="text" name="duration" placeholder="1-10">
									@error('duration')
             						<p class="help is-danger">{{ $message }}</p>
        							@enderror
								</div>
						</div>

					<div>
						<button type="submit" class="button is-primary">Create Programme</button>
					</div>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection