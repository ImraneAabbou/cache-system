<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
    public function research(Request $request)
    {
        $customerNumber = $request->input('search');
        $customerData = Redis::get('orders:'.$customerNumber);
        if (!$customerData) {
            return view('research')->with('error', 'No orders found for the given ID.');
        }
        $customerData = json_decode($customerData, true);
      //  if ($request->server('HTTP_CACHE_CONTROL') === 'max-age=0') {
        //    return view('research');
        // }
        $orders = $customerData['orders'];
        return view('research')->with('orders', $orders);
    }
}
