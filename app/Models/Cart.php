<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasUuids;

    protected $table ='carts';

    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'grand_total',
        'subtotal'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
