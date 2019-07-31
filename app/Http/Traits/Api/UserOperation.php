<?php


namespace App\Http\Traits;


use App\Address;
use App\User;
use Hash;
use Illuminate\Http\Request;

trait UserOperation
{
   public function RegisterUser($request,$role)
  {
      $inputs = $request->all();
      if ($request->image != null)
      {
          if ($request->hasFile('image')) {
              $picture = uploader($request,'image');
              $inputs['image'] = $picture;
          }
      }
      $inputs['password']=Hash::make($request->password);
      $inputs['verification_code']=1234;
      $inputs['is_verified']=1;
      $inputs['role'] = $role;
      return User::create($inputs);
  }

    public function UpdateClientProfile($user,$request)
    {
        $inputs = $request->all();

        if ($request->image != null)
        {
            if ($request->hasFile('image')) {
                $picture = uploader($request,'image');
                $user->update(['image' => $picture]);
            }
        }

        if($request->password != null) {$user->update(['password'=>Hash::make($request->password)]);}
        return $user->update(array_except($inputs,['password','image']));
    }

    public function UpdateClientSetting($user,$request)
    {
        $inputs = $request->all();
        return $user->update($inputs);
    }

    public function UpdateClientLocation($user,$request)
    {
        $inputs = $request->all();
        return $user->update($request->only('lat','long'));
    }

    public function UpdateUserAddress($user,$request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;
        return Address::create($inputs);
    }

    public function generateLoginCode($user){
        $code = '1234';
        $user->update(['login_code'=>$code]);
        return $code;

    }
}
