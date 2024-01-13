<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.layout1')
@section('content')

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Frequently Asked Questions</h2>

    @if(auth()->user() && auth()->user()->is_admin)
      <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">Add Questions</a>
      <a href="{{ route('faq-categories.create') }}" class="btn btn-primary mb-3">Add Categories</a>
  @endif

    @foreach($categories as $category)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $category->name }}
            @if(auth()->user() && auth()->user()->is_admin)
        <!-- Add delete button here for categories -->
        <form action="{{ route('faq-categories.destroy', ['faq_category' => $category->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
        </form>
        @endif
            </h3>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($faqs as $faq)
                @if($faq->category_id === $category->id)
                <li class="mb-3">
                    <h5 class="mb-2">{{ $faq->question }}</h5>
                    <p>{{ $faq->answer }}</p>
                    @if(auth()->user() && auth()->user()->is_admin)
                    <a href="{{ route('faqs.edit', ['faq' => $faq->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('faqs.destroy', ['faq' => $faq->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                </form>                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
