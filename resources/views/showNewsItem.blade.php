<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>{{ $newsItem->Title }}</h2>
        <p>{{ $newsItem->Content }}</p>
        <p>Published on: {{ date('Y M d', strtotime($newsItem->Publishing_date)) }}</p>
        <p>News ID: {{ $newsItem->id }}</p>
        <a href="{{ route('news.index') }}" class="btn btn-primary">Back to News</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
