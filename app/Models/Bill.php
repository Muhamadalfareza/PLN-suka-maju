<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'due_date', 'paid_status', 'paid_at',
    ];

    protected $dates = ['due_date', 'paid_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function meterReading()
    {
        return $this->belongsTo(MeterReading::class);
    }
}
