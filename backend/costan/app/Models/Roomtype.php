<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'price',
        'facilities',
        'image',
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }
}
