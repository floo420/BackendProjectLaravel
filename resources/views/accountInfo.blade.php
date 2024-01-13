<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>
@extends('layouts.layout1')
@section('content')

<div class="container">
<br/>
    <h1 class="text-center mb-4">Account Information</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <p><strong>Name:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar" style="max-width: 200px; height: auto;">
    @endif
    </div>

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate', $user->birthdate) }}">
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>

        <div class="form-group">
            <label for="about_me">About Me</label>
            <textarea name="about_me" id="about_me" class="form-control">{{ old('about_me', $user->about_me) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
