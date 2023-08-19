<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Helper\MailControl;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\SendMail;
use App\Models\Admin;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = Admin::query()->where("email", $request->email)->first();

        if ($user) {

            $renewCode = Hash::make(now()->format("Y-m-d H:i:s"));

            $renewLink = config("app.url") . '/reset-password?reset_token=' . $renewCode;

            $data = [
                "site_url" => config("app.url"),
                "mail_title" => "Şifre Yenileme Bağlantısı",
                "mail_content" => "Şifre yenileme isteğiniz alındı. Aşağıdaki Butona tıklayarak şifrenizi yenileyebilirsiniz.",
                "renew_link" => $renewLink,
            ];

            $address = $request->email;
            $template = 'resetPassword';
            $subject = "Şifre Yenileme Bağlantısı";

            if (MailControl::MailLicanceControl()) {
                Mail::to($address)->send(new SendMail($template, $data, $address, $subject));

                $datetime = Carbon::now()->format("Y-m-d H:i:s");
                PasswordReset::where("email", $request->email)->delete();

                $passwordReset = new PasswordReset();

                $passwordReset->insert([
                    "email" => $request->email,
                    "token" => $renewCode,
                    "created_at" => $datetime
                ]);

                return response()->json([
                    "status" => true,
                    "message" => "Please check your mail to reset your password"
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Make sure you have entered your mail settings and are correct."
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
    }

    public function resetPassword(ResetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {

        if (($request->has("reset_token"))) {
            $renewCode = PasswordReset::where("token", $request->reset_token)->first();

            $user = Admin::where("email", $renewCode->email)->first();

            $user->password = Hash::make($request->password);
            $result = $user->save();

            PasswordReset::where("email", $user->email)->delete();

            if ($result) {
                return response()->json([
                    "status" => true,
                    "message" => "User Registered Successfully",
                    "user" => $user,
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Validation error",
                ], 401);
            }

        } else {
            return response()->json([
                "status" => false,
                "message" => "Token not found"
            ], 301);
        }
    }
}
