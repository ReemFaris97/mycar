<?php
/**
 * Created by PhpStorm.
 * User: omar zain
 * Date: 3/28/2019
 * Time: 4:24 PM
 */


namespace App\Libraries;


class firebase
{
//    const SERVER_API_KEY = '';
    private $header = ['Authorization: key=AAAAZmNPNjA:APA91bEfgIfyomsIoTiO2wHfgsUMC9eBioDAMuiECEJQqiI6Ap2O7KcWVl1Hrne7voD2dqI9O-L6qkP9dAbHhEz3r9LdTBT0-Y-_ZBJPEo0cXr3ha0RZfci5ZMwJqV9xED5OGutvxdDO', 'Content-Type:Application/json',];

    public  function sendNotify($tokens,$title,$message,$type='order',$notify_id,$order_id=null){

        $msg = [
            "title"=>$title,
            "message"=>$message,
            "type"=>$type,
            "order_id"=>$order_id,
            'notify_id'=>$notify_id,
        ];

        $payload = ['registration_ids'=>$tokens,
            'data'=>$msg,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $this->header
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }

    }


    public  function sendMessage($tokens,$body,$icon=null,$image=null,$user_id){

        $msg = [
            "body"=>$body,
            "icon"=>$icon,
            "image"=>$image,
            "user_id"=>$user_id
        ];

        $payload = ['registration_ids'=>$tokens,
            'data'=>$msg,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $this->header
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }

    }
}
