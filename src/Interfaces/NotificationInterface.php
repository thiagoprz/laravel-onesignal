<?php

namespace Thiagoprz\Onesignal\Interfaces;

use Thiagoprz\Onesignal\OneSignal\Responses\NotificationResponse;

interface NotificationInterface
{
    public function create(): NotificationResponse;
}