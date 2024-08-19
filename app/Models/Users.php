<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama', 'email', 'password'];
    protected $hidden = ['password'];

    public function mutasi(): HasMany
    {
        return $this->hasMany(Mutasi::class, 'id_user', 'id_user');
        // return $this->hasMany(Mutasi::class, 'user_id_user', 'mutasi_id_user');
    }
}
