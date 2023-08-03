<?php

namespace App\Helper;

use App\Models\Setting;

class MailControl
{
    public static function getMailerSettings()
    {

        $settingsConfigArray = Setting::query()->where("group_key", "email_settings")->get();
        $settingsConfig = [];

        foreach ($settingsConfigArray as $config) {
            $settingsConfig[$config['key']] = $config['value'];
        }

        return [
            'MAIL_PORT' => $settingsConfig['mailer_port'],
            'MAIL_FROM_ADDRESS' => $settingsConfig['mailer_from_address'],
            'MAIL_FROM_NAME' => $settingsConfig['mailer_from_name'],
            'MAIL_PASSWORD' => $settingsConfig['mailer_password'],
            'MAIL_USERNAME' => $settingsConfig['mailer_username'],
            'MAIL_HOST' => $settingsConfig['mailer_host'],
            'MAIL_ENCRYPTION' => $settingsConfig['mailer_encryption'],
            'MAIL_DRIVER' => $settingsConfig['mailer_driver'],
        ];


    }

    public static function MailLicanceControl()
    {
        $mail_host = Setting::query()->select("value")->where("key", "mailer_host")->first();
        if ($mail_host->value == "") {
            return false;
        } else {
            return true;
        }
    }
}
