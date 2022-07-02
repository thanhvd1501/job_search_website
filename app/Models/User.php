<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    public function Company(): BelongsTo
    {
        return $this -> belongsTo(Company::class);
    }

    public function getRoleNameAttribute()
    {
        return UserRoleEnum ::getKeys($this -> role)[0];
    }

    public function getGenderNameAttribute()
    {
        return $this -> role === 0 ? 'Male' : 'Female';
    }
}
