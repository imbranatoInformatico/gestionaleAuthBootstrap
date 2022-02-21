<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pilot;
use App\Models\Race;



class Event extends Model
{
    use HasFactory;


    protected $fillable = ['idAmministratore','codiceEvento','nome','tipo','descrizione'];

    protected $table = "events";

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function pilots()
    {
        return $this->belongsToMany(Pilot::class, 'event_pilot');
    }

    public function races()
    {
        return $this->belongsToMany(Race::class, 'event_pilot');
    }
}
