<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = ['id', 'name'];
    //protected $with = ['author'];
    protected $fillable = [
        'name', 'desc', 'price', 'stock', 'image', 'category_id',
    ];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
                
        });
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function cartitem()
    {
        return $this->belongsTo(CartItem::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static function detail_barang($id)
    {
        $data = Product::where("id", $id)->first();
        // $data = Produk::find($id);
        return $data;
    }
    public function setGambarAttribute($value)
    {
        $this->attributes['image'] = $value;
    }
    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
}
