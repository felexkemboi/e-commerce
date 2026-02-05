<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Low Stock Alert</title>
</head>
<body>
    <h1>Low Stock Alert</h1>

    <p>Hello Admin,</p>

    <p>The following products are running low in stock:</p>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} (Stock: {{ $product->stock_quantity }})</li>
        @endforeach
    </ul>

    <p>Please restock these products as soon as possible.</p>

    <p>Best regards,<br>Your Inventory System</p>
</body>
</html>
