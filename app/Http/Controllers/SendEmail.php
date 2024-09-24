<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public static function send(Request $request){
        
        $receiver   = $request['email'];
        $subject    =   "Sample Email";
        $content    =   '<div style="width: 100%; max-width: 500px; margin: 0 auto; background-color: black;border-radius: 10px; 
                        overflow: hidden;">
                        <div style="background-color: #007bff; padding: 20px; text-align: center; color: #ffffff;">
                        <h1 style="margin: 0; font-size: 24px;">Alaiza Jean Natad</h1>
                        </div>';
        $name       =   "MIIT BSIT4";

        try{
            Mail::html($content, function ($message) use ($receiver, $name, $subject){
                $message
                ->to($receiver, $name)
                ->subject($subject);
            });

            return[
                "success" => true,
                "message" => "Email sent successfully"
            ];
        }
        catch (\Exception $e){
            return [
                "success" => false,
                "message" => $e->getMessage()
            ];
        }
    }
}