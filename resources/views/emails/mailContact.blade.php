<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Mail</title>
</head>
<body>
    <p>From: {{$details['name']}} &lt;{{$details['email']}}&gt;</p>
    <h2>{{$details['title']}}</h2>
    <p>{{$details['body']}}</p>
</body>
</html>