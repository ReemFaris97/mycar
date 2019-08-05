<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable =['user_id','is_read','ar_title','en_title','ar_message','en_message'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function MarkAsRead(){
        if ($this->is_read == 0) {
            $this->forceFill(['is_read' => 1])->save();
        }
    }

    public function title(){
        if(app()->getLocale() == 'ar')  return $this->ar_title;
        else return $this->en_title;
    }

    public function message(){
        if(app()->getLocale() == 'ar')  return $this->ar_message;
        else return $this->en_message;
    }
}
