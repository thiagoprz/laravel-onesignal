<?php

namespace Thiagoprz\Onesignal\Exceptions;

use Exception;
use Throwable;

class OnesignalClientException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}