<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sales Report</title>
</head>
<body>
    <h1>Sales Report for {{ now()->format('Y-m-d') }}</h1>

    <p>Hello Admin the following products were sold today:</p>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} : {{ $product->stock_quantity }} pieces</li>
        @endforeach
    </ul>

    <p>Best regards,<br>Your Inventory System</p>
</body>
</html>
