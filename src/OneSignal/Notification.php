<?php

namespace Thiagoprz\Onesignal\OneSignal;

use JsonSerializable;
use Psr\Log\LoggerInterface;
use Thiagoprz\Onesignal\Interfaces\ClientInterface;
use Thiagoprz\Onesignal\Interfaces\NotificationInterface;
use Thiagoprz\Onesignal\OneSignal\Responses\NotificationResponse;
use Thiagoprz\Onesignal\Traits\Logable;

class Notification implements JsonSerializable, NotificationInterface
{
    use Logable;

    const NOTIFICATION_ENDPOINT = 'notifications';
    private ClientInterface $client;
    private LoggerInterface $logger;

    private string $name;
    private array $contents;
    private array $headings;
    private array $subtitle;
    private array $template_id;
    private bool $content_available = false;
    private bool $mutable_content = true;
    private array $target_content_identifier;

    public function __construct(ClientInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @param string $name
     * @return Notification
     */
    public function setName(string $name): Notification
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $contents
     * @return Notification
     */
    public function setContents(array $contents): Notification
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @param array $headings
     * @return Notification
     */
    public function setHeadings(array $headings): Notification
    {
        $this->headings = $headings;
        return $this;
    }

    /**
     * @param array $subtitle
     * @return Notification
     */
    public function setSubtitle(array $subtitle): Notification
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @param array $template_id
     * @return Notification
     */
    public function setTemplateId(array $template_id): Notification
    {
        $this->template_id = $template_id;
        return $this;
    }

    /**
     * @param bool $content_available
     * @return Notification
     */
    public function setContentAvailable(bool $content_available): Notification
    {
        $this->content_available = $content_available;
        return $this;
    }

    /**
     * @param bool $mutable_content
     * @return Notification
     */
    public function setMutableContent(bool $mutable_content): Notification
    {
        $this->mutable_content = $mutable_content;
        return $this;
    }

    /**
     * @param array $target_content_identifier
     * @return Notification
     */
    public function setTargetContentIdentifier(array $target_content_identifier): Notification
    {
        $this->target_content_identifier = $target_content_identifier;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'contents' => $this->contents,
            'headings' => $this->headings,
            'subtitle' => $this->subtitle,
            'template_id' => $this->template_id,
            'content_available' => $this->content_available,
            'mutable_content' => $this->mutable_content,
            'target_content_identifier' => $this->target_content_identifier,
        ];
    }

    /**
     * @return NotificationResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function create(): NotificationResponse
    {
        $this->log('Creating notification', $this->jsonSerialize());
        $result = $this->client->post(self::NOTIFICATION_ENDPOINT, json_encode($this));
        $this->log('Response', compact('result'));
        return new NotificationResponse($result->body);
    }
}