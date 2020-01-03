<?php

namespace App\sdmobileapp\helpers;
class SmsHelper
{
    public static function sendSms($userId, $mobile_numb, $subject)
    {
        $user_details = User::find($userId);

        if($user_details->confirmed)
        {
            try {
                Twilio::message($mobile_numb, $subject);
                return true;
            }  catch (Services_Twilio_RestException $e) {
                return false;
            }
        else {
            return false;
        }

    }

    public static function sendSignupOtp($mobile_numb, $subject)
    {
        try {
            Twilio::message($mobile_numb, $subject);
            return true;
        }
        catch (Services_Twilio_RestException $e)
        {
            return false;
        }

    }
}
