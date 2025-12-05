<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'customerNumber',
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesRepEmployeeNumber',
        'creditLimit',
    ];

    protected $primaryKey = 'customerNumber';

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerNumber');
    }
}
  
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'orderNumber',
        'orderDate',
        'requiredDate',
        'shippedDate',
        'status',
        'comments',
        'customerNumber',

    ];
    protected $primaryKey = 'orderNumber';
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber');
    }

}
