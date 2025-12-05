<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
        body {
                display: flex;
                min-height: 100vh;
                justify-content: center;
                align-items: center;
                background-color: #ADB4B2;
                opacity: 0.99;
                font-family: 'JetBrains Mono', monospace;
                font-weight: 300;
            }
            h2 {
                color: #f1f1f1;
            }
            .btn {
                background-color: #121212;
                color: #f1f1f1;
                border: none;
                font-weight: 300;
            }
            .btn:hover {
                background-color: #888888;
                color: #f1f1f1;
            }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <a class="btn btn-primary" href="{{ route('customers.index') }}">Customers </a>
            </div>
            <div class="col-lg-6 text-center">
                <a class="btn btn-primary" href="{{ route('orders.index') }}">Orders </a>
            </div>
        </div>
    </div>
</body>
</html>


