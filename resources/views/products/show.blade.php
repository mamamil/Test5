<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ставвки</title>
</head>
<body>
    <h1>{{ $product->title }}</h1>
    <p>{{ $product->description }}</p>
    <p>Текущая ставка: {{ $product->max_bid }}</p>
    
    @if(auth()->check())
        <form method="POST" action="/product/{{ $product->id }}/bid">
            @csrf
            <input type="number" name="bid_amount" placeholder="Ваша ставка">
            <button type="submit">сделать ставку</button>
        </form>
    @endif
    @endforeach
</body>
</html>