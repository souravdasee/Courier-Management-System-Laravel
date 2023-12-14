<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, "id", "users_id");
    }

    public function role()
    {
        return $this->hasOne(Role::class, "role", 'roles_id');
    }
}
