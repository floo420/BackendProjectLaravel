<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>Create a News Item</h2>
    
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="Title" name="Title" required>
        </div>

        <!-- Content -->
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea class="form-control" id="Content" name="Content" rows="5" required></textarea>
        </div>

        <!-- Cover Image -->
        <div class="form-group">
            <label for="Cover_image">Cover Image</label>
            <input type="file" class="form-control-file" id="Cover_image" name="Cover_image">
        </div>

        <!-- Publishing Date -->
        <div class="form-group">
            <label for="Publishing_date">Publishing Date</label>
            <input type="date" class="form-control" id="Publishing_date" name="Publishing_date" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create News</button>
    </form>
</div>
</body>
</html>