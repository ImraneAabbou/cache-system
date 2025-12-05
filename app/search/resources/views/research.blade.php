<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #454846;
            color: #eeeeee;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 300;
            font-size: 14px;
            display: flex;
            justify-content: center;
        }

        .main-container {
            width: 95%;
            margin-top: 5%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 70%;
        }

        input[type="text"] {
            background-color: black;
            color: white;
            border: none;
        }

        input[type="text"]::placeholder {
            color: white;
            opacity: 0.6;
        }

        button {
            background-color: black;
            color: white;
            border: 1px solid white;
            padding: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            background-color: #1c1c1c;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        th,
        td {
            text-align: center;
            padding: 6px 8px;
            border: none;
        }

        th {
            background-color: #1f1f1f;
            color: #aaaaaa;
            font-weight: 300;
            font-size: 12px;
            text-transform: lowercase;
        }

        tr:nth-child(even) {
            background-color: #181818;
        }

        tr:hover {
            background-color: #2c2c2c;
            cursor: pointer;
        }
        form {
            transform: scale(2);
            transform-origin: 0 0;
            }

    </style>
</head>
<body>
    <div class="main-container">
        <div class="header-container">
            <h1>Customer Orders</h1>
            <form action="{{ url('/research') }}" method="get">
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" placeholder="Enter Customer ID" required >
                <button type="submit">Search</button>
            </form>
        </div>

    @if(isset($error))
        <p>{{ $error }}</p>
    @endif

    @if(isset($orders))
        <h2>Orders</h2>
        @if (count($orders) > 0)
            <table id="orders">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Order Number</th>
                        <th>Status</th>
                        <th>Required Date</th>
                        <th>Shipped Date</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['orderDate'] }}</td>
                            <td>{{ $order['orderNumber'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['requiredDate'] }}</td>
                            <td>{{ $order['shippedDate'] }}</td>
                            <td>{{ $order['comments'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders found for the given ID.</p>
        @endif
    @endif

<script src="{{ asset('js/app.js') }}"></script>
<script>
function createTableCell(content) {
    const cell = document.createElement("td");
    cell.textContent = content;
    return cell;
}

function updateOrderInTable(order) {
    const tbody = document.querySelector("#orders tbody");
    const newRow = document.createElement("tr");

    newRow.appendChild(createTableCell(order.orderDate));
    newRow.appendChild(createTableCell(order.orderNumber));
    newRow.appendChild(createTableCell(order.status));
    newRow.appendChild(createTableCell(order.requiredDate));
    newRow.appendChild(createTableCell(order.shippedDate));
    newRow.appendChild(createTableCell(order.comments));

    tbody.appendChild(newRow);
}
</script>

<script type='module'>
    window.Echo.channel('orders')
        .listen('.NewOrder', (e) => {
            console.log('New order received:', e.order);
            updateOrderInTable(e.order);
        });
</script>
</body>
</html>



