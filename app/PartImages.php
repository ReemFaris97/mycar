<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PartImages extends Model
{
    use SoftDeletes;
    protected $fillable =['part_id','ar_name','en_name','code','image','number'];

    public function part(){
        return $this->belongsTo(Part::class,'part_id');
    }
}
