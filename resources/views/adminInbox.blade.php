<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inbox</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.layout1')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Admin Inbox</h1>

    @foreach ($messages as $message)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">From: {{ $message->user->name }} ({{ $message->user->email }})</h5>
            <h6 class="card-subtitle mb-2 text-muted">Subject: {{ $message->subject }}</h6>
            <p class="card-text">Message: {{ $message->content }}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
