<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['ar_name','en_name','image'];


    public function name()
    {
        if (app()->getLocale() == 'ar')
            return $this->ar_name;
        else
            return $this->en_name;
    }

    public function comments(){
        return $this->hasMany(ProposalComments::class,'proposal_id');
    }

    public function likes(){
        return $this->hasMany(ProposalLikes::class,'proposal_id')->where('like',1);
    }
    public function dislikes(){
        return $this->hasMany(ProposalLikes::class,'proposal_id')->where('like',0);
    }

}
