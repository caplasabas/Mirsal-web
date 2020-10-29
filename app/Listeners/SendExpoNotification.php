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

    public function sendNotification($id,$bodyEnglish,$bodyArabic,$group,$filter)
    {

        // $exponentToken = "ExponentPushToken[".$exponentToken."]";
        $exponentToken = $exponentToken;
        // $exponentToken = "ExponentPushToken[nsG6PfCwBkrF2HUwdMtpSK]";
        // $exponentToken = "ExponentPushToken[35213515]";
        $postFields = "{\n  \"to\": \"".$exponentToken."\",\n  \"title\":\"".$title."\",\n  \"body\": ".$body."\n}";
        
        $filter3 = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$event->user->id,"relation"=>"=")
        );
        // echo $postFields; exit;
        $content = array(
                "en" => $body,
                "ar" => $body
        );
        $title = array(
            "en" => "Payment",
            "ar" => "دفع"
        );
        $hashes_array = array();
        $fields = array(
            'app_id' => "467061a2-9264-4738-b764-5490c488502b",
            // 'included_segments' => array(
            //     'All'
            // ),
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
