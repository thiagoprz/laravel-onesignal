<?php

namespace Thiagoprz\Onesignal\Traits;

trait Logable
{

    /**
     * Logs messages
     *
     * @param string $message Message
     * @param int $type Type of error
     * @param array $context Context of the log
     * @return void
     */
    private function log(string $message, int $type = LOG_ERR, array $context = [])
    {
        switch($type) {
            case LOG_DEBUG:
                if (config('safe2pay.debug')) {
                    $this->logger->debug($message, $context);
                }
                break;
            case LOG_INFO:
                $this->logger->info($message, $context);
                break;
            default:
                $this->logger->error($message, $context);
                break;
        }
    }

}