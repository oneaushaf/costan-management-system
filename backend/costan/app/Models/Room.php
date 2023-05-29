<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $primary_key = 'id';
    protected $fillable = [
        'name',
        'roomtype_id',
        'desc',
        'floor',
        'maintenance',
        'user_id',
        'until'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function roomtype(){
        return $this->belongsTo(Roomtype::class);
    }
    public function contracts(){
        return $this->hasMany(Contract::class);
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
}
