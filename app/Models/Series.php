<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    // Aqui é preenchido os dados que podem ser enviados em massa
    // na prática, ele verifica todos os dados e ignora aqueles 
    // que não estão configurados aqui
    protected $fillable = ['nome']; 
    protected $with = ['seasons'];  //evita aquele problema de Lazy pq já deixa carregado(-performace)

    public function seasons(){
        return $this->hasMany(Season::class, 'series_id', 'id');   
    }

    protected static function booted(){
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }
}
