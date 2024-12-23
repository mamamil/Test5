<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ставки</title>
</head>
<body>
    @foreach($products as $product)
    <div>
        <h3><a href="/product/{{ $product->id }}">{{ $product->title }}</a></h3>
        <p>{{ $product->description }}</p>
        <p>Текущая ставка: {{ $product->max_bid }}</p>
    </div>
@endforeach
</body>
</html>
