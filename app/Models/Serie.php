<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    // Aqui é preenchido os dados que podem ser enviados em massa
    // na prática, ele verifica todos os dados e ignora aqueles 
    // que não estão configurados aqui
    protected $fillable = ['nome']; 
}
