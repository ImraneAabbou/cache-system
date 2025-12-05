<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Order </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Add JetBrains Mono font -->
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

    .form-group label,
    .form-group strong {
        color: #f1f1f1;
    }

    .form-control {
        background-color: #333333;
        color: #f1f1f1;
        border: none;
    }

    .form-control::placeholder {
        color: #9e9e9e;
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
</style>
</head>

<body>
    <div class="container mt-2">
    <div class="row">
            <div class="col-lg-8">
                <h2>Add Order</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}">All orders</a>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('customer.orders.store', ['customerNumber' => $customer->customerNumber]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

 
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order Number:</strong>
                        <input type="number" name="orderNumber"  class="form-control"
                            placeholder="Order Number">
                        @error('orderNumber')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
       
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order Date:</strong>
                        <input type="date" name="orderDate"  class="form-control"
                            placeholder="Order Date">
                        @error('orderDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
           
     
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Required Date:</strong>
                        <input type="date" name="requiredDate" class="form-control" placeholder="required Datee"
                        >
                        @error('requiredDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
       
   
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Shipped Date:</strong>
                        <input type="date" name="shippedDate" class="form-control" placeholder="shipped Date"
                          >
                        @error('shippedDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order Status:</strong>
                        <select name="status" id="status-select" class="form-control">
                            <option value="">-- Choose a status --</option>
                            <option value="On Hold" >On Hold</option>
                            <option value="In Process" >In Process</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Resolved" >Resolved</option>
                            <option value="Disputed" >Disputed</option>
                            <option value="Shipped" >Shipped</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
       
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order Comments:</strong>
                        <input type="text" name="comments" class="form-control" placeholder="comments"
          >
                        @error('comments')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
          

               

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>