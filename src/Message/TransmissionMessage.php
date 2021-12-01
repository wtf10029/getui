<?php


namespace Wtf10029\Getui\Message;


/**
 * Class TransmissionMessage
 * @package Getui
 */
class TransmissionMessage implements MessageInterface
{
    protected $data = [];

    public function toArray(): array
    {
        $data = $this->data;

        return ['notification' => $data];
    }


    public function setPushMessage()
    {
        return ['transmission' => json_encode($this->data['payload'])];
    }


    public function setTitle(string $title)
    {
        $this->data['payload']['title'] = $title;
        $this->data['title'] = $title;
        return $this;
    }

    public function setBody(string $body)
    {
        $this->data['payload']['body'] = $body;
        $this->data['body'] = $body;
        return $this;
    }

    /**
     * @param string $clickType
     * @return $this
     */
    public function setClickType(string $clickType)
    {
        $this->data['click_type'] = $clickType;
        return $this;
    }

    /**
     * 设置自定义消息内容
     * @param array $payload
     * @return $this
     */
    public function setPayload(array $payload)
    {
        $this->data['payload'] = array_merge($this->data['payload'], $payload);
        return $this;
    }
}