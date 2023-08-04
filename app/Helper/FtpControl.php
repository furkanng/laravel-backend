<?php

namespace App\Helper;

use App\Models\Setting;
use Dflydev\DotAccessData\Data;

class FtpControl//TODO:İPTAL EDİLECEK
{
    public static function getFtpSettings()
    {
        $settingsConfigArray = Setting::query()->where("group_key", "ftp_settings")->get();
        $settingsConfig = [];

        foreach ($settingsConfigArray as $config) {
            $settingsConfig[$config['key']] = $config['value'];
        }

        return [
            'FILESYSTEM_DISK' => $settingsConfig['filesystem_disk'],
            'FTP_HOST' => $settingsConfig['ftp_host'],
            'FTP_USERNAME' => $settingsConfig['ftp_username'],
            'FTP_PASSWORD' => $settingsConfig['ftp_password'],
            'FTP_ROOT' => $settingsConfig['ftp_root'],
            'FTP_PORT' => $settingsConfig['ftp_port'],
            'FTP_OPTIONS' => ['transferMode' => FTP_BINARY],
        ];
    }

    public static function FtpLicanceControl()
    {
        $ftp_host = Setting::query()->select("value")->where("key", "ftp_host")->first();
        if ($ftp_host->value == "") {
            return false;
        } else {
            return true;
        }
    }
}
