<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'players';

    protected $fillable = [
        'club_id',
        'first_name',
        'last_name',
        'position',
        'date_of_birth',
        'country',
        'height',
        'foot',
        'market_value',
        'status',
    ];

    public function club() {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }
}
