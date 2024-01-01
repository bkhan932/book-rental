<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <p>Hello {{ $rental->user->name }},</p>

    <p>This is a reminder that the book "{{ $rental->book->name }}" is due for return on {{ $rental->return_date }}.</p>

    <p>Thank you for using our book rental service!</p>

    <p>Best regards,<br>
    Book Rental Team</p>
</body>
</html>
