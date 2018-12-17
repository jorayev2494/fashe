<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>
<body>

    {{--  {{ dd($data) }}  --}}

    <h1>{{ $data["email"] }}</h1>

    <p>Phone: {{ $data["phone_number"] }}</p>
    <p>Email: {{ $data["email"] }}</p>
    <p>Message: {{ $data["message"] }}</p>

</body>
</html>
