<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categori extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'category', 'price', 'description',
    ];

    public function meterReadings()
    {
        return $this->hasMany(MeterReading::class);
    }
}
