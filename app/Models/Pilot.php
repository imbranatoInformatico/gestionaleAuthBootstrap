<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Race;

class Pilot extends Model
{
    use HasFactory;
    protected $table = 'pilots';


    protected $fillable = ['idAmministratore','nome','cognome','sesso','idCategoria','idTeam','mail','telefono','img'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_pilot');
    }
    public function races()
    {
        return $this->belongsToMany(Race::class,'race_pilot')->withPivot('partecipazione');
    }
    public function rankings()
    {
        return $this->belongsToMany(Ranking::class,'ranking_pilot')->withPivot('race_id','posizioneQualifica','posizioneGara1','posizioneGara2','puntoGara1','puntoGara2','puntoPole','puntoPoleCategoria','puntoPresenza')->withTimestamps();
    }

    public function categoriesMany()
    {
        return $this->belongsToMany(Category::class, 'categories_pilots');
    }
 
}
