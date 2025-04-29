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


    public function veiculos()
    {
        return $this->hasMany(Veiculo::class, 'categoria_id', 'id');
    }

    protected static function booted()
    {
        self::deleting(function (Categoria $categoria) {
            $categoria->veiculos()->each(function ($veiculo) {
                $veiculo->delete();
            });
        });
    }
}
