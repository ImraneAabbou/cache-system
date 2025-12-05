<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
