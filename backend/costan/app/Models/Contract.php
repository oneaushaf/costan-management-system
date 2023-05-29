<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $primary_key = 'id';
    protected $fillable = [
        'room_id',
        'user_id',
        'payment',
        'name',
        'username',
        'phone',
        'accepted',
        'months',
        'until',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
