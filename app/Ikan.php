<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ikan extends Model
{
    use SoftDeletes;
    
    protected $table = "ikan";
}
