<?php

namespace App\Providers;

use App\Helper\MailControl;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Schema::defaultStringLength(191);// Satır uzunluğu hatası için kısıtlama yapan çözüm

        /*
        //migrate fresh ve db:seed yaparken tabloyu bulamadığı için hata veriyor. onun için önce veri varmı diye kontrol ediyoruz.
        if (Schema::hasTable('settings')) {
            $mail = [
                "driver" => MailControl::getMailerSettings()["MAIL_DRIVER"],
                "host" => MailControl::getMailerSettings()["MAIL_HOST"],
                "port" => MailControl::getMailerSettings()["MAIL_PORT"],
                "encryption" => MailControl::getMailerSettings()["MAIL_ENCRYPTION"],
                "username" => MailControl::getMailerSettings()["MAIL_USERNAME"],
                "password" => MailControl::getMailerSettings()["MAIL_PASSWORD"],
                "from" => [
                    "address" => MailControl::getMailerSettings()["MAIL_FROM_ADDRESS"],
                    "name" => MailControl::getMailerSettings()["MAIL_FROM_NAME"],
                ]
            ];

            \config()->set("mail", $mail);
        }
        */


    }


}
