<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['veiculo_id', 'categoria'];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function carros()
    {
        return $this->hasMany(ListaCarro::class);
    }
}
