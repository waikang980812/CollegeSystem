@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User Info</div>

                <div class="card-body">
	<label class="label">User ID : {{$userinfo->users->id}}</label>
	<form method="POST" action="/userinfo/{{ $userinfo->id}}">
		@csrf
	@method('PATCH')
	<div class="field">
	  <label class="label">Name</label>
	  <div class="control">
	    <input class="input @error('name') input is-danger @enderror" type="text" placeholder="Text input" name="name" value="{{$userinfo->users->name}}">
	    @error('name')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	  </div>
	  </div>
	  <div class="field">
	    <label class="label">Email</label>
	    <div class="control">
	      <input class="input @error('email') input is-danger @enderror" type="text" placeholder="Text input" name="email" value="{{$userinfo->users->email}}">
	      @error('email')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	    </div>
	  </div>
	  <div class="field">
	    <label class="label">Contact Number</label>
	    <div class="control">
	      <input class="input  @error('contactno') input is-danger @enderror" type="text" placeholder="Text input" name="contactno" value="{{$userinfo->contact_no}}">
	      @error('contactno')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	    </div>
	  </div>
	  <div class="field">
	  	<label class="label">Gender</label>
	  <div class="control">
	    <div class="select">
	       <select name="gender">
           		<option value="M" @php if($userinfo->gender=="M"){echo("selected");}@endphp>Male</option>
            	<option value="F" @php if($userinfo->gender=="F"){echo("selected");}@endphp>Female</option>
           </select>
	    </div>
	  </div>
	</div>
	 <div class="field">
	  	<label class="label">Role</label>
	  		<div class="control">
	  			<div class="select">
	       		<select name="role">
           	  @php
                $roles = App\Roles::all();
              @endphp
              @foreach($roles as $role)
                   <option value="{{$role->id}}" @php if($role->id==$userinfo->users->roles->id){echo("selected");} @endphp>{{$role->title}}</option>
              @endforeach
           </select>
	    </div>
	  </div>
	  </div>
	   <div class="field">
            <label  class="label">{{ __('Birth Date:') }}</label>
            <div class="control">
            	<div class="select">
                <input type="date" claass ="@error('birthdate') input is-danger @enderror" name="birthdate" value="{{$userinfo->birth_date}}">
                @error('birthdate')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
                </div>
            </div>
        </div>
         <div class="field">
	  	<label class="label">Address</label>
	  		<div class="control">
	<textarea class="textarea @error('address') input is-danger @enderror" name="address">{{$userinfo->address}}</textarea>
	 @error('address')
             <p class="help is-danger">{{ $message }}</p>
        @enderror
	 </div>
	  </div>
	
	  <div class="control">
	  <button class="button is-primary">Update User</button>
	</div>
</form>
	
 </div>
            </div>
        </div>
    </div>
</div>
@endsection