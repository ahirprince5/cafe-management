<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeTable extends Model
{
    use HasFactory;

    protected $fillable = ['table_number', 'capacity', 'status', 'location'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
