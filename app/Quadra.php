<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quadra extends Model
{
    protected $fillable = array('valorLocacao', 'tipoQuadra_id');
}
