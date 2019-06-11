<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable , HasRolesAndAbilities,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','login_code','type','image','address','lat','lng','licence_number','licence_image','commission','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasAnyRole(){
        if(auth()->check()){
            if(auth()->user()->roles->count()){
                return true;
            }
        }else{
            redirect(route('admin.login'));
        }

    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id');
    }

    public function wallet()
    {
        $for_supplier = $this->transactions->where('type','wait')->sum('value');
        $paid_for_supplier = $this->transactions->where('type','done')->sum('value');
        $rest = $for_supplier - $paid_for_supplier ;
        return $rest;
    }

    public function make_transaction($value,$type,$reason=null)
    {
        $transaction = Transaction::create([
            'value'=>$value,
            'type'=>$type,
            'reason'=>$reason,
            'user_id'=>$this->id,
        ]);
        return $transaction;
    }


    public function notifications(){
        return $this->hasMany(Notification::class,'model_id');
    }


//    public function generateLoginCode(){
//        $code = '1234';
//        $this->login_code = $code;
//        $this->save();
//        return $code;
//    }

}
