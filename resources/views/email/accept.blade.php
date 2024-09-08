<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<p class="text-2xl font-bold"><strong>{!! $messageContent !!}</strong></p>
<a href="{{ url('/login') }}" class="text-white px-2 py-1 rounded-md">Login ka boss</a>
</body>
</html>