<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Recado extends Model
{

    public function scopeAtivos($query) {
        return $query->where('status', 1);
    }
    
}
