<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>panel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet">
        <style>
            body {
                display: flex;
                min-height: 100vh;
                justify-content: center;
                align-items: center;
                background-color: #454846;
                font-family: 'JetBrains Mono', monospace;
                font-weight: 300;
            }

            h2 {
                color: #f1f1f1;
            }

            .btn {
                background-color: #666666;
                color: #f1f1f1;
                border: none;
                font-weight: 300;
            }

            .btn:hover {
                background-color: #888888;
                color: #f1f1f1;
            }

            .alert {
                background-color: #666666;
                color: #f1f1f1;
                border: none;
            }

            table {
                background-color: #333333;
                color: #f1f1f1;
                border: none;
            }

            th {
                color: #f1f1f1;
                border: none;
            }

            td {
                color: #f1f1f1;
                border: none;
            }

            a {
                text-decoration: none;
            }
            /* Pagination */
            .pagination {
                justify-content: center;
            }

            .pagination .page-item.active .page-link {
                background-color: #666666;
                border-color: #666666;
            }

            .pagination .page-link {
                color: #000000; /* Changed to black */
                border-color: #333333;
            }

            .pagination .page-link:hover {
                background-color: #888888;
                border-color: #888888;
            }

            .pagination .page-item.disabled .page-link {
                color: #9e9e9e;
                background-color: transparent;
                border-color: #333333;
            }


        </style>
    </head>
    <body>
        <div class="container mt-2">   
            <div class="row">
                <div class="col-lg-8">
                    <h2>Customers table</h2>
                </div>
                <div class="col-lg-4 text-right">
                    <a class="btn btn-success" href="{{ route('customers.create') }}">Create customer</a>
                </div>
            </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>     
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>SRENum</th>
                            <th>CreditLimit</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->customerNumber }}</td>
                                <td>{{ $customer->customerName }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->city }}</td>
                                <td>{{ $customer->country }}</td>
                                <td>{{ $customer->salesRepEmployeeNumber }}</td>
                                <td>{{ $customer->creditLimit }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->customerNumber) }}">Edit</a>
                                    <a class="btn btn-primary" href="{{ route('customer.orders',$customer->customerNumber) }}">Orders</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div>
                {!! $customers->links() !!}  
                </div>
        </div>
    </body>
</html>