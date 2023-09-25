@extends('master')

@section('content')
<div class="container">
    <h2 class="title">Your Report</h2>
    <div class="content">
        <div class="mb-3">
            <h4>Name: <span>{{ $name }}</span></h4>
        </div>
        <div class="mb-3">
            <h4>Email: <span>{{ $email }}</span></h4>
        </div>
        <div class="mb-3">
            <h4>Password: <span>{{ $password }}</span></h4>
        </div>
        <div class="mb-3">
            <h4>Points: <span>{{ $points }}</span></h4>
        </div>
        <div class="mb-3">
            <h4 align="center">Image: </h4>
            <img src="{{ asset('storage/' . $imagePath) }}" class="rounded mx-auto d-block border border-3 border-dark" width="200px">
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection