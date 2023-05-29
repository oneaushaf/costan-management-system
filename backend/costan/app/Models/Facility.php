<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $fillable = [
        'name',
    ];

    public function roomtypes(){
        return $this->belongsToMany(RoomType::class);
    }
}
