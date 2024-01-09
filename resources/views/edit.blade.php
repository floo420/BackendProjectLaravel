<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-4">
    <h2>Edit News</h2>

    <form action="{{ route('news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control @error('Title') is-invalid @enderror" id="Title" name="Title" value="{{ old('Title', $newsItem->Title) }}" required>
            @error('Title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Content -->
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea class="form-control @error('Content') is-invalid @enderror" id="Content" name="Content" rows="5" required>{{ old('Content', $newsItem->Content) }}</textarea>
            @error('Content')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Cover Image -->
        <div class="form-group">
            <label for="Cover_image">Cover Image</label>
            <input type="file" class="form-control-file @error('Cover_image') is-invalid @enderror" id="Cover_image" name="Cover_image">
            @error('Cover_image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Publishing Date -->
        <div class="form-group">
            <label for="Publishing_date">Publishing Date</label>
            <input type="date" class="form-control @error('Publishing_date') is-invalid @enderror" id="Publishing_date" name="Publishing_date" value="{{ old('Publishing_date', $newsItem->Publishing_date) }}" required>
            @error('Publishing_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update News</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>