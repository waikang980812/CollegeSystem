@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <ul>
                        <li><a href="/register">Create New User</a></li>
                        <li><a href="/userinfo">Manage Users</a></li>
                        <li><a href="/roles">Manage Roles</a></li>
                        <li><a href="/faculty">Manage Faculty And Programmes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
