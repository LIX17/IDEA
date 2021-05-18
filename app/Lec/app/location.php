<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function product(){
        return $this->hasMany(product::class);
    }

    protected $fillable = [
        'name', 'image',
    ];
}
