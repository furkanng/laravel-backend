<?php

namespace App\Providers;

use App\Helper\FtpControl;
use App\Helper\MailControl;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Config;

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
        Schema::defaultStringLength(191);

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
}
