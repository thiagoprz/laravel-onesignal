<?php

namespace Thiagoprz\Onesignal\OneSignal\Responses;

use Spatie\DataTransferObject\DataTransferObject;
use stdClass;

class ClientResponse extends DataTransferObject
{
    /**
     * @var array
     */
    public array $body;

    /**
     * @var int
     */
    public int $status;
}