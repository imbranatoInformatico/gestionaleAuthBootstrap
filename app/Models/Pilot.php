<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Pilot extends Model
{
    use HasFactory;
    protected $table = 'pilots';


    protected $fillable = ['idAmministratore','nome','cognome','sesso','idCategoria','idTeam','mail','telefono','img'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_pilot');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}
