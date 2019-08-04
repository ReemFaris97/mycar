<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use  HasRolesAndAbilities,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','login_code','type','image','address','lat','lng','licence_number','licence_image','commission','is_active','region'
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


    public function MoneyOnUser(){
        return  $this->transactions->where('type','on')->where('order_id','!=',null)->sum('value');
    }

    public function MoneyForUser(){
        return $this->transactions->where('type','for')->where('order_id','!=',null)->sum('value');
    }

    public function wallet()
    {
        $for_supplier = $this->transactions->where('type','for')->sum('value');
        $on_supplier = $this->transactions->where('type','on')->sum('value');
        $rest = $for_supplier - $on_supplier ;
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

    public function messages()
    {
        return $this->hasMany(Message::class,'user_id');
    }

    public function channel_info()
    {
        $chat = Chat::where('user_id',$this->id)->first();
        if (!$chat)
        {
            $chat = Chat::create(['user_id'=>$this->id]);
        }
        $data=['chat_id'=>$chat->id, 'channel_name'=>$chat->channel_name(), 'total_message'=>$chat->total_message_pages()];
        return $data;
    }


    public function devices(){
        return $this->hasMany(Device::class);
    }




//    public function generateLoginCode(){
//        $code = '1234';
//        $this->login_code = $code;
//        $this->save();
//        return $code;
//    }

}
