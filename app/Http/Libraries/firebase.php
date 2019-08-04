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
    private $header = ['Authorization: key=AAAAE4YUuy8:APA91bH0EYUeayYC3PFuOzdUvcbe3c6QVEJEuyU3Pa9wCspofloMZ8jOfureUKs-bpGQ5-pdKSS0XnMi4RcJGDzU3nPUeIN69XY68uHrGTbhQZFbt7xU_lf5BrHI5xWf8Twg3c9hLp5V', 'Content-Type:Application/json',];

    public  function sendNotify($tokens,$title,$body,$icon=null,$image=null,$click_action=null,$username = null){

        $msg = [
            "title"=>$title,
            "body"=>$body,
            "icon"=>$icon,
            "image"=>$image,
            "click_action"=>$click_action,
            'username'=>$username
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
//        else {
//            return $response;
//        }
    }
}
