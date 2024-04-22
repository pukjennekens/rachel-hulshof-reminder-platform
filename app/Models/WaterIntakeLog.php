<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterIntakeLog extends Model
{
    protected $fillable = ['date', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
