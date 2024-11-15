<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function housePhotos()
    {
        return $this->hasMany(HousePhoto::class, 'house_id', 'id');
    }
}
