<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }
}
