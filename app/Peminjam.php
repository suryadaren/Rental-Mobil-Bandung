<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $fillable = [
        'cars_id', 'name', 'identitas', 'date', 'day', 'phone', 'status'
    ];

    public function car(){
    	return $this->belongsTo(Car::class,'cars_id');
    }
}
