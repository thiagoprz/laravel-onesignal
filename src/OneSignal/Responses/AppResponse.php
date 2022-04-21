<?php

namespace Thiagoprz\Onesignal\OneSignal\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class AppResponse extends DataTransferObject
{

    public string $id;
    public string $name;
    public string $gcm_key;
    public ?string $chrome_key;
    public ?string $chrome_web_key;
    public ?string $chrome_web_origin;
    public ?string $chrome_web_gcm_sender_id;
    public ?string $chrome_web_default_notification_icon;
    public ?string $chrome_web_sub_domain;
    public ?string $apns_env;
    public ?string $apns_certificates;
    public ?string $safari_apns_certificate;
    public ?string $safari_site_origin;
    public ?string $safari_push_id;
    public ?string $safari_icon_16_16;
    public ?string $safari_icon_32_32;
    public ?string $safari_icon_64_64;
    public ?string $safari_icon_128_128;
    public ?string $safari_icon_256_256;
    public ?string $site_name;
    public string $created_at;
    public ?string $updated_at;
    public int $players;
    public int $messageable_players;
    public string $basic_auth_key;
    public bool $additional_data_is_root_payload;
}