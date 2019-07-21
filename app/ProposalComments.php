<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalComments extends Model
{
    protected $fillable = ['user_id','comment','proposal_id'];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
