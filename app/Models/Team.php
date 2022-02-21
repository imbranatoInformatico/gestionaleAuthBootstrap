<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['nome','img','idEvento'];

    public function pilots()
    {
        return $this->hasMany(Pilot::class, 'idTeam');
    }

}
