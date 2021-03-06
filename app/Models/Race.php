<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Pilot;


class Race extends Model
{
    use HasFactory;

    protected $table = 'races';


    protected $fillable = ['nome','circuito','costoGara','dataGara','idEvento'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_race');
    }

    public function pilots()
    {
        return $this->belongsToMany(Pilot::class,'race_pilot')->withPivot('partecipazione');
    }

}
