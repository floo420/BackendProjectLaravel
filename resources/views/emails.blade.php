<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Notification</title>
</head>
<body>
    <h2>Contact Form Notification</h2>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
