<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand', 'stock', 'price', 'status', 'photo'
    ];

    public function peminjam(){
        return $this->hasMany(Peminjam::class);
    }


}
