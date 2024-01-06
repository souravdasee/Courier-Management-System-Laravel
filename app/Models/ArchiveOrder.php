<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveOrder extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query) =>
            $query->where(
                fn ($query) =>
                $query->where('tracking_id', '=', request('search'))
            )
        );
    }
}
