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

        $ftp = [
            "driver" => FtpControl::getFtpSettings()["FILESYSTEM_DISK"],
            "host" => FtpControl::getFtpSettings()["FTP_HOST"],
            "port" => (int)FtpControl::getFtpSettings()["FTP_PORT"],
            "root" => FtpControl::getFtpSettings()["FTP_ROOT"],
            "username" => FtpControl::getFtpSettings()["FTP_USERNAME"],
            "password" => FtpControl::getFtpSettings()["FTP_PASSWORD"],
            "options" => FtpControl::getFtpSettings()["FTP_OPTIONS"],
        ];

        \config()->set("filesystems.disks.ftp", $ftp);

    }
}
