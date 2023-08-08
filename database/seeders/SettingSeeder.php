<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("settings")->delete();

        $defaultData =
            [
                ['title' => 'Set Mailer Title', 'key' => 'mailer_from_name', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Driver', 'key' => 'mailer_driver', 'value' => 'smtp', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer From', 'key' => 'mailer_from_address', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Port', 'key' => 'mailer_port', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Password', 'key' => 'mailer_password', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Username', 'key' => 'mailer_username', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Encryption', 'key' => 'mailer_encryption', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Host', 'key' => 'mailer_host', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Site Logo', 'key' => 'site_logo', 'value' => '', "type" => 'image', "group_key" => 'general_settings'],
                ['title' => 'Set Site Footer Logo', 'key' => 'site_footer_logo', 'value' => '', "type" => 'image', "group_key" => 'general_settings'],
                ['title' => 'Set Site Favicon', 'key' => 'site_favicon', 'value' => '', "type" => 'image', "group_key" => 'general_settings'],
                ['title' => 'Set Site Title', 'key' => 'site_title', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Site Keywords', 'key' => 'site_keywords', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Site Description', 'key' => 'site_description', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Url Facebook', 'key' => 'media_facebook', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Instagram', 'key' => 'media_instagram', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Twitter', 'key' => 'media_twitter', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Linkedin', 'key' => 'media_linkedin', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Youtube', 'key' => 'media_youtube', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Contact Phone', 'key' => 'contact_phone', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Title', 'key' => 'contact_title', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Fax', 'key' => 'contact_fax', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Email', 'key' => 'contact_email', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Address', 'key' => 'contact_address', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Api Whatsapp', 'key' => 'whatsapp_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Phone', 'key' => 'phone_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Analytics', 'key' => 'analytics_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Webmaster Tools', 'key' => 'webmaster_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Map', 'key' => 'map_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Live Support', 'key' => 'livesupport_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Google Rchaptha', 'key' => 'rcaptha_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
            ];

        Setting::query()->insert($defaultData);
    }
}
