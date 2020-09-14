<?php

namespace App\Listeners;

use App\Events\OnRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOTPVerificationSMS
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
     * @param  OnRegister  $event
     * @return void
     */
    public function handle(OnRegister $event)
    {
        $this->sendSMS($event->user);
    }

    public function sendSMS($user)
    {
        $phone = $user->phone;
        // $phone = "966502936013"; // FOR TEST
        $otp_code = mt_rand(1000, 9999);
        $user->otp_code = $otp_code;
        $user->save();
        $message = "كود التفعيل الخاص بكم في الريف : ".$otp_code."";
        $message = urlencode($message);
        $trimmed_phone = $str1 = substr($phone, 1); 
        $new_phone_format = "+966".$trimmed_phone;

        $url = "https://www.hisms.ws/api.php?send_sms&username=966564544702&password=Naif1211&numbers=".$new_phone_format."&sender=mirsalApp&message=".$message;

        $ch = curl_init();
        echo "URL: ".$url."<br>";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();

        $result = curl_exec($ch);
        echo "Result: ".$result;
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
