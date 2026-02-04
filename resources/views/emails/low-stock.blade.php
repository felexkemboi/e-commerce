<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Low Stock Alert</title>
</head>
<body>
    <h1>Low Stock Alert</h1>

    <p>Hello Admin,</p>

    <p>The following product is running low in stock:</p>

    <ul>
        <li><strong>Name:</strong> {{ $product->name }}</li>
        <li><strong>Stock:</strong> {{ $product->stock_quantity }}</li>
    </ul>

    <p>Please restock this product as soon as possible.</p>

    <p>Best regards,<br>Your Inventory System</p>
</body>
</html>
