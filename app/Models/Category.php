<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descrizione','colore','idEvento'];

    public function pilots()
    {
        return $this->hasMany(Pilot::class, 'idCategoria');
    }

    public function ranking(){
        return $this->belongsTo(Ranking::class, 'idCategory');
    }

    public function pilotsMany()
    {
        return $this->hasMany(Pilot::class, 'categories_pilots');
    }

}
