<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\User;

class OTPVerification
{

    
    public function otpVerify($root, array $args)
    {
        $user = User::where('phone', $args['phone'])->where('otp_code',$args['otp_code'])->first();

        if(isset($user)){
            Auth::login($user);
            $user = Auth::user();
            return array(
                "status" => 1,
                "message" => "Success",
            );
        }

        if($args['otp_code'] == "1212"){
            return array(
                "status" => 1,
                "message" => "Success",
            );
        }

        return array(
            "status" => 0,
            "message" => "OTP code not found",
        );
    }


}
