<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'leagues';

    protected $fillable = [
        'name',
        'country',
        'status',
    ];

    public function clubs() {
        return $this->hasMany(Club::class, 'league_id', 'id');
    }
}
