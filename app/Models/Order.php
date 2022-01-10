<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pin_code',
        'total_price',
        'status',
        'city',
        'message',
        'tracking_number',
    ];

    public function ordered_products()
    {
        return $this->hasMany(OrderedProduct::class);
    }

}
