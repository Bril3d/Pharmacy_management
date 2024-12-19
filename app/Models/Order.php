<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_address', 'total_price', 'user_id'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
