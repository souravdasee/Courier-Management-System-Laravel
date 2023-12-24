<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;

    public function weight()
    {
        return $this->belongsTo(Weight::class, 'weights_id');
    }
}
