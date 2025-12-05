<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Customer Form</title>
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
                <h2>Edit Customer</h2>
            </div>
            <div class="col-lg-4 text-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}">All customers</a>
            </div>
        </div>


        
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('customers.update',$customer->customerNumber) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer Name:</strong>
                        <input type="text" name="customerName" value="{{ $customer->customerName }}" class="form-control"
                            placeholder="Customer name">
                        @error('customerName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer last name:</strong>
                        <input type="text" name="contactLastName" class="form-control" placeholder="Customer Last Name"
                            value="{{ $customer->contactLastName }}">
                        @error('contactLastName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
           
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer First Name:</strong>
                        <input type="text" name="contactFirstName" class="form-control" placeholder="Customer First Name"
                            value="{{ $customer->contactFirstName }}">
                        @error('contactFirstName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer phone number:</strong>
                        <input type="tel" name="phone" class="form-control" placeholder="Customer phone number"
                            value="{{ $customer->phone }}">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer addressLine1:</strong>
                        <input type="text" name="addressLine1" class="form-control" placeholder="Customer addressLine1"
                            value="{{ $customer->addressLine1 }}">
                        @error('addressLine1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer addressLine2:</strong>
                        <input type="text" name="addressLine2" class="form-control" placeholder="Customer addressLine2"
                            value="{{ $customer->addressLine2 }}">
                        @error('addressLine2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer city:</strong>
                        <input type="text" name="city" class="form-control" placeholder="Customer city"
                            value="{{ $customer->city }}">
                        @error('city')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer state:</strong>
                        <input type="text" name="state" class="form-control" placeholder="Customer state"
                            value="{{ $customer->state }}">
                        @error('state')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer postalCode:</strong>
                        <input type="number" name="postalCode" class="form-control" placeholder="Customer postalCode"
                            value="{{ $customer->postalCode }}">
                        @error('postalCode')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer country:</strong>
                        <input type="text" name="country" class="form-control" placeholder="Customer country"
                            value="{{ $customer->country }}">
                        @error('country')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer sales Rep Employee Number:</strong>
                        <input type="number" name="salesRepEmployeeNumber" class="form-control" placeholder="Customer sales Rep Employee Number"
                            value="{{ $customer->salesRepEmployeeNumber }}">
                        @error('salesRepEmployeeNumber')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Customer credit Limit:</strong>
                        <input type="number" name="creditLimit" class="form-control" placeholder="Customer credit Limit"
                            value="{{ $customer->creditLimit }}">
                        @error('creditLimit')
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