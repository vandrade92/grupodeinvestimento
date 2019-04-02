<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;


    protected $fillable = ['instituition_id', 'name', 'description', 'index', 'interest_rate'];

    public function instituition()
    {
        return $this->belongsTo(Instituition::Class);
    }

    public function valueFromUser(User $user)
    {

        $inFlows = $this->moviments()->product($this)->Applications()->sum('value');
        $outFlows = $this->moviments()->product($this)->OutFlows()->sum('value');
        
        return $inFlows - $outFlows;
    }

    public function moviments()
    {
         return $this->hasMany(Moviment::class);
    }

}
