<?php

namespace Thiagoprz\Onesignal\Interfaces;

use Thiagoprz\Onesignal\OneSignal\Responses\AppResponse;

interface AppsInterface
{

    public function viewApp(): AppResponse;
}