<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clubs';

    protected $fillable = [
        'league_id',
        'name',
        'status',
    ];

    public function league() {
        return $this->belongsTo(League::class, 'league_id', 'id');
    }

    public function players() {
        return $this->hasMany(Player::class, 'club_id', 'id');
    }
}
