<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';


    protected $fillable = ['nome','descrizione','idCategory','idEvento'];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function pilots()
    {
        return $this->belongsToMany(Pilot::class,'ranking_pilot')->withPivot('race_id','posizioneQualifica','posizioneGara1','posizioneGara2','puntoGara1','puntoGara2','puntoPole','puntoPoleCategoria','puntoPresenza')->withTimestamps();;
    }
}
