<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    public function scopeAtivos($query) {
        return $query->where('status', '>', 0);
    }

    public function getValorAttribute($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public function getImagemAttribute($value) {
        return str_replace('\\', '/',$value);
    }
}
