<?php

namespace App\Models;

use App\Traits\QueryScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, QueryScope;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $table = 'roles';

    public function users() {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

}
