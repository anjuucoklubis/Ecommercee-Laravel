<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CategoryProduct extends Model
{
  
    use HasFactory, Notifiable;
    protected $guarded = ['id', 'name'];
    // protected $with = ['author'];
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
        });
    }

    static function detail_barang($id)
    {
        $data = CategoryProduct::where("id",$id)->first();
         $data = CategoryProduct::find($id);
        return $data;
    }
    


}
