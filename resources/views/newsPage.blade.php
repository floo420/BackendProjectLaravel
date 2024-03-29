  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  @extends('layouts.layout1')
  @section('content')

  <div class="container mt-4">
    <h2 class="mb-4">Latest News</h2>

    {{-- Conditionally show the "Add News" button for admin users --}}
    @if(auth()->user() && auth()->user()->is_admin)
        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add News</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($newsItems as $news)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $news->Cover_image) }}" class="card-img-top" alt="Cover Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->Title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($news->Content, 100) }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        @if($news->Publishing_date)
                            Published on: {{ date('Y M d', strtotime($news->Publishing_date)) }}
                        @else
                            No publishing date available
                        @endif
                        <br>
                        News ID: {{ $news->id }}
                        @if(auth()->user() && auth()->user()->is_admin)
                            <!-- Display "Edit" button for admins -->
                            <a href="{{ route('news.edit', ['id' => $news->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            
                            <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif

                        <!-- Comments Section -->
                        <div class="mt-3">
                            <h6>Comments:</h6>
                             @isset($news->comments)
                               @foreach($news->comments as $comment)
                                <div class="mb-2">
                                <strong>{{ $comment->user->first_name }}:</strong> 
                                {{ $comment->comment_text }}
                                </div>
                              @endforeach
                           @else
                                <p>No comments available.</p>
                          @endisset

                        <!-- Comment Form -->
                          <form action="{{ route('comments.store') }}" method="POST">
                           @csrf
                         <input type="hidden" name="news_id" value="{{ $news->id }}">
                         <div class="form-group">
                        <textarea name="comment_text" class="form-control" rows="3" required></textarea>
                        </div>
                         <button type="submit" class="btn btn-primary">Add Comment</button>
                         </form>
                      </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p>No news items found.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
