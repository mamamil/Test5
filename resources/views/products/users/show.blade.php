<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ваши лоты</title>
</head>
<body>
    <h1>лоты пользователя {{ $user->name }}</h1>
@foreach($user->lots as $lot)
    <div>
        <h3>{{ $lot->title }}</h3>
        <p>{{ $lot->description }}</p>
        <p>текущая ставка: {{ $lot->max_bid }}</p>
    </div>
@endforeach
</body>
</html>