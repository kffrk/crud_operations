<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $casts = [
        'permissions' => 'array',
    ];

    protected $fillable = [
        'id',
        'name',
    ];

    public function users(){
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
