<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Categoria extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nome'
    ];


    public function carros()
    {
        return $this->hasMany(ListaCarro::class);
    }
}
