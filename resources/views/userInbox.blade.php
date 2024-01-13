<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Inbox</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.layout1')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">User Inbox</h1>

    @foreach ($messages as $message)
    <div class="card mb-3">
        <div class="card-body">
            <div class="message-sender">
                TO ADMIN
            </div>
            <h5 class="card-title">Subject: {{ $message->subject }}</h5>
            <p class="card-text">{{ $message->content }}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
