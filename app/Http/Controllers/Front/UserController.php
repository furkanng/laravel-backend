<?php

namespace App\Http\Controllers\Front;

use App\Helper\MailControl;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\SendMail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request):JsonResponse{

    $user = User::where('email',$request->email)->first();

    if($user){

        $resetToken = Hash::make(now()->format("Y-m-d H:i:s"));

        $resetLink = config("app.url").'/reset-password?reset_token='.$resetToken;

        $data = [
          "site_url"=>config("app.url"),
          "mail_title"=>"Şifre Yenileme Bağlantısı",
          "mail_content" =>"Aşağıdaki butona tıklayarak şifrenizi yenileyebilirsiniz",
          "renew_link"=>$resetLink,
        ];

        $email = $request->email;
        $template = "resetPassword";
        $subject = "Şifre Yenileme Bağlantısı";
        //kullanıcı mail bilgisi doğru mu kontrol edilir
        if(MailControl::MailLicanceControl()){

            Mail::to($email)->send(new SendMail($template,$data,$email,$subject));

            $datetime = Carbon::now()->format("Y-m-d H:i:s");
            //daha önce oluşturulan tokeni siler
            PasswordReset::where('email',$email)->delete();

            $passwordReset = new PasswordReset();

            $passwordReset->insert([
                "email"=>$request->email,
                "token"=>$resetToken,
                "created_at"=>$datetime
            ]);

            return response()->json([
                "status"=>true,
                "message"=>"Şifre yenilemeniz için mailinizi kontrol ediniz"
            ]);


        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"Mail bilgilerinizin doğru olduğunu kontrol edin"
            ]);
        }


    }
    else{
        return response()->json([
            "status"=>false,
            "message"=>"User not found"
        ]);
    }

    }

    public function  resetPassword(ResetPasswordRequest $request):JsonResponse{

        if($request->has("reset_token")){

            $resetToken = PasswordReset::where("token",$request->reset_token)->first();

            $user = User::where("email",$resetToken->email)->first();

            $user->password = Hash::make($request->password);
            $result = $user->save();

            // şifresini yenilediyse tokeni tablodan siler
            PasswordReset::where('email',$user->email)->delete();
            if($result){

                return response()->json([
                   "status"=>true,
                   "message"=>"Successfully reset  password",
                   "user"=>$user
                ]);

            }
            else{
                return response()->json([
                   "status"=>false,
                   "message"=>"Reset password error"
                ],401);
            }


        }
        else{
           return response()->json([
               "status"=>false,
               "message"=>"Token not found"
           ]);
        }

    }
}
