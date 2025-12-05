<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CustomerController extends Controller
{ 
    public function index()
    {
        $customers = Customer::orderBy('customerNumber','desc')->paginate(5);
        return view('Customers.index', compact('customers'));
    }

  


    public function create()
    {
        return view('Customers.create');
    }
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

  
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'customerNumber' => 'required',
            'customerName' => 'required',
            'contactFirstName' => 'required',
            'contactFirstName' => 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalCode' => 'required',
            'country' => 'required',
            'salesRepEmployeeNumber' => '1611',
            'creditLimit' => 'required',
        ]);
        
       
        $customer = new Customer($request->post());
        $customer->salesRepEmployeeNumber = 1611;
        $customer->save();

        return redirect()->route('customers.index')->with('success','Customer has been created successfully.');
    }


    

 
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customerName' => 'required',
            'contactFirstName' => 'required',
            'contactFirstName' => 'required',
            'phone' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postalCode' => 'required',
            'country' => 'required',
            'creditLimit' => 'required',

        ]);
        
        $customer->fill([
            'customerName' => $request->input('customerName'),
            'contactFirstName' => $request->input('contactFirstName'),
            'contactFirstName' => $request->input('contactFirstName'),
            'phone' => $request->input('phone'),
            'addressLine1' => $request->input('addressLine1'),
            'addressLine2' => $request->input('addressLine2'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postalCode' => $request->input('postalCode'),
            'country' => $request->input('country'),
            'salesRepEmployeeNumber' => 1611,
            'creditLimit' => $request->input('creditLimit')
            
            ])->save();



        return redirect()->route('customers.index')->with('success','customer Has Been updated successfully');
    }

  
    


 

    //Orders
    public function showOrders($customerNumber)
    {
    $customer = Customer::findOrFail($customerNumber);
    $orders = $customer->orders()->paginate(5);
    return view('customers.orders', compact('customer', 'orders'));
    }
    public function editOrder($customerNumber, $orderNumber)
    {
        $customer = Customer::findOrFail($customerNumber);
        $order = $customer->orders()->findOrFail($orderNumber);
        return view('customers.editOrder', compact('customer', 'order'));
    }
    public function createOrder($customerNumber)
    {
        $customer = Customer::findOrFail($customerNumber);
        return view('customers.createOrder', compact('customer'));
    }


    public function storeOrder(Request $request, $customerNumber)
    {
        $customer = Customer::findOrFail($customerNumber);
        $request->validate([
            'orderNumber' => 'required',
            'orderDate' => 'required',
            'requiredDate' => 'required',
            'status' => 'required'
        ]);
       
        $order = new Order([
            'orderNumber' => $request->input('orderNumber'),
            'orderDate' => $request->input('orderDate'),
            'requiredDate' => $request->input('requiredDate'),
            'shippedDate' => $request->input('shippedDate') ?? '1970-01-01', // in case order is not shipped we will set it to the unix epoch start date as a default
            'status' => $request->input('status'),
            'comments' => $request->input('comments') ?? '', // in case the order has no comments it will be an empty string as a default to avoid null values in the database and in nifi flow
            'customerNumber' =>  $request->$customerNumber
        ]);
        //dd($customer->customerNumber, $order->orderNumber);
        $orderNumber = $order->orderNumber;

        $customer->orders()->save($order);
        // Call runProduceScript with the customer number
        $this->runProduceScript($customer->customerNumber, $orderNumber);

        return redirect()->route('customer.orders', ['customerNumber' => $customer->customerNumber])
                        ->with('success', 'Order creaaed successfully!');
    }


 

    public function updateOrder(Request $request, $customerNumber, $orderNumber)
    {
            $customer = Customer::findOrFail($customerNumber);
            $order = $customer->orders()->findOrFail($orderNumber);
        
        $request->validate([
            'orderNumber' => 'required',
            'orderDate' => 'required',
            'requiredDate' => 'required',
            'status' => 'required'
        ]);

        $order->fill([
            'orderNumber' => $request->input('orderNumber'),
            'orderDate' => $request->input('orderDate'),
            'requiredDate' => $request->input('requiredDate'),
            'shippedDate' => $request->input('shippedDate')?? '1970-01-01', // in case order is not shipped we will set it to the unix epoch start date as a default
            'status' => $request->input('status'),
            'comments' => $request->input('comments') ?? '', // in case the order has no comments it will be an empty string as a default to avoid null values in the database and in nifi flow
            'customerNumber' =>  $customerNumber
        ])->save();

        $this->runProduceScript($customer->customerNumber, $order->orderNumber);

        return redirect()->route('customer.orders', ['customerNumber' => $order->customerNumber])
                        ->with('success', 'Order updated successfully!');
    }




    private function runProduceScript($customerNumber, $orderNumber) {
        $pythonPath = '/opt/homebrew/bin/python3';
        $scriptPath = base_path('scripts/produce.py');

        $process = new Process([$pythonPath, $scriptPath, (string)$customerNumber, (string)$orderNumber]);
        $process->setTimeout(60);

        try {
            $process->mustRun();
            $output = $process->getOutput();
            return $output;
        } catch (ProcessFailedException $exception) {
            return 'Error: ' . $exception->getMessage();
        }
    }

}
