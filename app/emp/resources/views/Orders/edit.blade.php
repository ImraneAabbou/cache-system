<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order Form </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
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
                <h2>Edit Order</h2>
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
        <form action="{{ route('orders.update',$order->orderNumber) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">     

            <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>order Number:</strong>
                        <input type="number" name="orderNumber" value="{{ $order->orderNumber }}" class="form-control"
                            placeholder="order Number">
                        @error('orderNumber')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>order Date:</strong>
                        <input type="date" name="orderDate" class="form-control" placeholder="order Date"
                            value="{{ $order->orderDate }}">
                        @error('orderDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>           

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>required Date:</strong>
                        <input type="date" name="requiredDate" class="form-control" placeholder="required Date"
                            value="{{ $order->requiredDate }}">
                        @error('requiredDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>shipped Date:</strong>
                        <input type="date" name="shippedDate" class="form-control" placeholder="shipped Date"
                            value="{{ $order->shippedDate }}">
                        @error('shippedDate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>    
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>status:</strong>
                        <select name="status" id="status-select" class="form-control">
                            <option value="">-- Choose a status --</option>
                            <option value="On Hold" {{ $order->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                            <option value="In Process" {{ $order->status == 'In Process' ? 'selected' : '' }}>In Process</option>
                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="Resolved" {{ $order->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="Disputed" {{ $order->status == 'Disputed' ? 'selected' : '' }}>Disputed</option>
                            <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>comments:</strong>
                        <input type="text" name="comments" class="form-control" placeholder="comments"
                            value="{{ $order->comments }}">
                        @error('comments')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                     <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>customer Number:</strong>
                        <input type="number" name="customerNumber" class="form-control" placeholder="customerNumber"
                            value="{{ $order->customerNumber }}">
                        @error('customerNumber')
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