<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'cafe_table_id', 'customer_name', 'customer_phone',
        'reservation_date', 'reservation_time', 'guests', 
        'special_requests', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cafeTable()
    {
        return $this->belongsTo(CafeTable::class);
    }
}
