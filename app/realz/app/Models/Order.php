<?php


namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'customerOrders';

    protected $fillable = [
        'customerNumber', 'customerName', 'phone', 'addressLine1', 'country', 'city',
        'salesRepEmployeeNumber', 'orderDate', 'orderNumber', 'status', 'requiredDate',
        'shippedDate', 'comments'
    ];
}
