<?php

namespace App\Listeners;

use App\Events\WhenUserDoSomething;
use App\Model\LogNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExpoNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WhenUserDoSomething  $event
     * @return void
     */
    public function handle(WhenUserDoSomething $event)
    {   
        $this->callToNotify($event);
        // $this->sendNotification("test","test","test");

    }

    public function sendNotification($title,$body,$exponentToken)
    {

        // $exponentToken = "ExponentPushToken[".$exponentToken."]";
        $exponentToken = $exponentToken;
        // $exponentToken = "ExponentPushToken[nsG6PfCwBkrF2HUwdMtpSK]";
        // $exponentToken = "ExponentPushToken[35213515]";
        $postFields = "{\n  \"to\": \"".$exponentToken."\",\n  \"title\":\"".$title."\",\n  \"body\": ".$body."\n}";
        
        // echo $postFields; exit;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\r\n\t\"to\": \"".$exponentToken."\",\r\n\t\"title\": \"".$title."\",\r\n\t\"body\": \"".$body."\"\r\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        curl_close($curl);
        
    }

    public function callToNotify($event)
    {
        $title = "lahoom";

        if(isset($event->order)){
            $order_id = $event->order->id; 
        }
        
        switch ($event->type) {
            case 'BOOKED':
                $message="Your booking has been booked , order id : ".$order_id."  . ";
                $message_ar="تم حجز طلبك بنجاح . رقم الطلب:".$order_id;
                break;
            case 'CANCELLED':
                $message="Your booking has been cancelled , please contact the management.";
                $message_ar="تم الغاء الطلب  ، نرجو التواصل مع الادارة ";
                break;
            case 'ON_THE_WAY':
                $message="Your items is on the way ";
                $message_ar="سوف يتم إيصال طلبك قريبا ، سوف يتم التواصل معك . ";
                break;
            case 'DELIVERED':
                $message="Your item is delivered ، you can rate from my account - previous orders";
                $message_ar="تم توصيل طلبك بنجاح ، يمكنك تقييم الخدمة من حسابي - طلباتي السابقة ";
                break;
        }

        // $body = "{\"message\": \"".$message."\", \"message_ar\": \"".$message_ar."\"}";
        $body = $message_ar;

        $this->sendNotification($title,$body,$event->user->exponent_token);

        $this->logNotification($event->user->id,$event->order->id,$event->type,$title,$message,$message_ar);
    }

    public function logNotification($user_id,$order_id,$type,$title,$message,$message_ar)
    {
        $logNotification = new LogNotification;
        $logNotification->order_id = $order_id;
        $logNotification->user_id = $user_id;
        $logNotification->type = $type;
        $logNotification->title = $title;
        $logNotification->message = $message;
        $logNotification->message_ar = $message_ar;
        $logNotification->save();
    }
}
