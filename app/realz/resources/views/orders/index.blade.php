<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <!-- Add JetBrains Mono font -->

<!-- Add JetBrains Mono font -->
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet">

<style>
    body {
        background-color: #454846;
        color: #eeeeee;
        font-family: 'JetBrains Mono', monospace;
        font-weight: 300;
        font-size: 14px;
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

</style>


</head>
 
<body>

<div class="container">


        <h1>Incoming orders </h1>
  

    <table id="orders" class="table table-dark table-hover">
        <thead>
            <tr>
                <th>Customer Number</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Address Line 1</th>
                <th>Country</th>
                <th>City</th>
                <th>Sales Emp</th>
                <th>Order Date</th>
                <th>Order Number</th>
                <th>Status</th>
                <th>Required Date</th>
                <th>Shipped Date</th>
                <th>Commentssssssssss</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customerNumber }}</td>
                    <td>{{ $order->customerName }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->addressLine1 }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->salesRepEmployeeNumber }}</td>
                    <td>{{ $order->orderDate }}</td>
                    <td>{{ $order->orderNumber }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->requiredDate }}</td>
                    <td>{{ $order->shippedDate }}</td>
                    <td>{{ $order->comments }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    @vite('resources/js/app.js')

    <script  src="{{ asset('/build/assets/app-4ed993c7.js') }}"></script>
    <script  src="{{ asset('/build/assets/app-d8914b94.js') }}"></script>
    <script>
        function addNewOrderToTable(order) {
            const table = document.getElementById('orders').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td>${order.customerNumber}</td>
                <td>${order.customerName}</td>
                <td>${order.phone}</td>
                <td>${order.addressLine1}</td>
                <td>${order.country}</td>
                <td>${order.city}</td>
                <td>${order.salesRepEmployeeNumber}</td>
                <td>${order.orderDate}</td>
                <td>${order.orderNumber}</td>
                <td>${order.status}</td>
                <td>${order.requiredDate}</td>
                <td>${order.shippedDate}</td>
                <td>${order.comments}</td>
            `;
        }
        </script>
    <script type="module" >
        window.Echo.channel('orders')
            .listen('.NewOrder', (e) => {
                console.log('New order received:', e.order);
                addNewOrderToTable(e.order);
            });
    </script>




</body>
</html>
