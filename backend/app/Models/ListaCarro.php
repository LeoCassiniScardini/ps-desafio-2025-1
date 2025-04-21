<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaCarro extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'marca', 'ano', 'imagem', 'categoria_id', 'quantidade'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}