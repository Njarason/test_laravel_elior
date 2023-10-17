<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MonMailable;
use App\Models\UserClient;
class EmailController extends Controller
{
    public function forgotPassword(Request $request){
        $emailController = new EmailController();
        $user = $emailController->getUser($request->email);
        $code  = $emailController->generateRandomCode(8);
        if(count($user)>0){
            $updateUser = $emailController->updateAccount($user[0]->id , $code);
            EmailController::sendEmail($user[0]->name , $user[0]->email, "Votre code de réinitialisation est ", $code);
            return response()->json(1);    
        } else {
            return response()->json(0);
        }
    }

    public function getUser($email){
        $user = UserClient::where('email',$email)->get();
        return $user;
    }

    function generateRandomCode($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $code = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $code .= $characters[$randomIndex];
        }
        
        return $code;
    }
    public function testEmail(Request $requestCLient){
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'expediteur' => 'Client',
            'destinateur' => $requestCLient->email,
            'content_email' => "Vous avez utiliser cette email pour votre inscription",
            'subject' => "Test de compte pour l'inscription",
            'code' => ""
         ]);
         $res = Mail::to($request->destinateur)->bcc('njarason.ceres.p4@gmail.com')->send(new MonMailable($request));
        return 1;
    }
    public function sendEmailStripeLink($owner, $link,$content){
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'expediteur' => $owner->name,
            'destinateur' => $owner->email,
            'content_email' => $content,
            'subject' => 'Configuration de compte stripe',
            'code' => $link
         ]);
         Mail::to($request->destinateur)->bcc('njarason.ceres.p4@gmail.com')->send(new MonMailable($request));
         return response()->json('Email envoyé');
    }

    public function sendEmail($owner, $ownerAdress, $content, $code){
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'expediteur' => $owner,
            'destinateur' => $ownerAdress,
            'content_email' => $content,
            'subject' => 'Réinitialisation de mot de passe',
            'code' => $code
         ]);
         Mail::to($request->destinateur)->bcc('njarason.ceres.p4@gmail.com')->send(new MonMailable($request));
         return response()->json('Email envoyé');
    }

    public function updateAccount($userId, $code){
        $data =  UserClient::findOrFail($userId);
        $data->forgot_password_code = $code;
        return $data->save();
    }


}
