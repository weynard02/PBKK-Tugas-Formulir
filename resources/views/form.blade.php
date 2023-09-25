@extends('master')

@section('content')
<form action="/submitdata" method="POST" enctype="multipart/form-data">
    @csrf
    <h2 class="center">Feedback Form</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" size="50" class="form-control" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
       	@enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" >
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
       	@enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass')}}"> 
        @error('pass')
            <div class="alert alert-danger">{{ $message }}</div>
       	@enderror
    </div>
    <div class="mb-3">
        <label for="points">Give your ratings (2,50 - 99,99)</label>
        <input type="number" step="0.01" class="form-control" id="points" name="points" value="{{old('points')}}">
        @error('points')
            <div class="alert alert-danger">{{ $message }}</div>
       	@enderror
    </div>
    <div class="mb-3">
        <label for="image">Upload your Image</label>
        <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}" accept="image/*">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</form>
@endsection