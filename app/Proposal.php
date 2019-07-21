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

    public function like(){
        return $this->hasOne(ProposalLikes::class,'proposal_id')->where('like',1);
    }
    public function dislike(){
        return $this->hasOne(ProposalLikes::class,'proposal_id')->where('like',0);
    }

    public function checkLike(){
        if($this->like()->count() >0) { return 1; }
        elseif ($this->dislike()->count() >0) {return -1;}
        else { return 0; }
    }

}
