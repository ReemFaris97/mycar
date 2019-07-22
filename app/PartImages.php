<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartImages extends Model
{
    protected $fillable =['part_id','ar_name','en_name','code','image','number'];

    public function part(){
        return $this->belongsTo(Part::class,'part_id');
    }
}
