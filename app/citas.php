<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    protected $fillable = ['nombre','servicio','mail','fecha','hora','numero'];
}
