<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Storage;
use Throwable;

class Veiculo extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nome', 
        'marca', 
        'ano', 
        'imagem', 
        'categoria_id', 
        'quantidade',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    protected static function booted()
    {
        self::deleted(function (Veiculo $veiculo) {
            try {
                $image_name = explode('veiculo/', $veiculo['imagem']);
                if (isset($image_name[1])) {
                    Storage::disk('public')->delete('veiculo/'.$image_name[1]);
                }
            } catch (Throwable) {
            }
        });
    }
}
