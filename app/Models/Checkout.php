<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class, "id", "users_id");
    }

    public function role()
    {
        return $this->hasOne(Role::class, "role", 'roles_id');
    }

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
