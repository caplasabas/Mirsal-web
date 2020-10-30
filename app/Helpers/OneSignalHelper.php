<?php

namespace App\Helpers;

use App\Model\LogNotification;

class OneSignalHelper
{
    public static function notification($id,$user_id,$user_id_to_notify,$type,$group,$filter){

        // $filter3 = array(
        //     array("field"=>"tag","key"=>"userId","value"=>"userId_".$event->user->id,"relation"=>"=")
        // );

        $content = self::selectMessage($type);

        $title = array(
            "en" => "Mirsal",
            "ar" => "Mirsal"
        );
        $hashes_array = array();
        $fields = array(
            'app_id' => "467061a2-9264-4738-b764-5490c488502b",
            'headings'=> $title,
            'contents' => $content,
            "android_group"=>$group,
            'filters' => $filter
        );
        
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic YmMxYzdiNmQtOTA1NC00ZDkyLWIyYTgtNWIyNGNlODI2NWUz'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        self::logNotification($user_id, $content['en'],$content['ar'], $type, $user_id_to_notify);
    }
    
    public static function logNotification($user_id, $message,$message_ar, $type, $user_id_to_notify){
        $logNotification = new LogNotification;
        $logNotification->user_id = $user_id;
        $logNotification->user_id_to_notify = $user_id_to_notify;
        $logNotification->type = $type;
        $logNotification->message = $message;
        $logNotification->read = 0;
        // $logNotification->message_ar = $message_ar;
        
        $logNotification->save();
    }

    public static function selectMessage($type){

        switch ($type) {
            case 'MESSAGE':
                $message=" New Message! ";
                $message_ar=" New Message!";
                break;
            case 'VET_OFFER_CREATED':
                $message="New Vet Offer";
                $message_ar="New Vet Offer";
                break;
            case 'VET_OFFER_ACCEPTED':
                $message="Offer Accepted";
                $message_ar="Offer Accepted";
                break;
            case 'DRIVER_OFFER_CREATED':
                $message="New Driver Offer";
                $message_ar="New Vet Offer";
                break;
            case 'CLIENT_OFFER_CREATED':
                $message="New Client Offer";
                $message_ar="New Client Offer";
                break;
            
                
        }
        return array(
            "en" =>  $message,
            "ar" => $message_ar
        );
    }

}
