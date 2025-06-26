<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['título', 'imagem', 'descricao', 'conteudo'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
