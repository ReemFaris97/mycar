<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $fillable = ['ar_title','en_title','ar_description','en_description','image'];
}
