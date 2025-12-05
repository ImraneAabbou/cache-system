<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{ 
    public function index()
    {
        $orders = Order::orderBy('orderNumber','desc')->paginate(5);
        return view('Orders.index', compact('orders'));
    } 
    public function create()
    {
        return view('Orders.create');
    }
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }
    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'orderNumber' => 'required',
            'orderDate' => 'required',
            'requiredDate' => 'required',
            'status' => 'required',
            'customerNumber' => 'required',
        ]);
      
        Order::create($request->post());
 
        return redirect()->route('orders.index')->with('success','Order has been created successfully.');
    }
   
    public function update(Request $request, Order $order)
    {
  
        $request->validate([
            'orderNumber' => 'required',
            'orderDate' => 'required',
            'requiredDate' => 'required',
            'status' => 'required',
            'customerNumber' => 'required',
        ]); 
        $order->fill($request->post())->save();
        return redirect()->route('customer.orders', ['customerNumber' => $order->customerNumber])->with('success','order Has Been updated successfully');
    }

}
