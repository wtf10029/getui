<?php


namespace Wtf10029\Getui;

use Wtf10029\Getui\Message\NotificationMessage;

/**
 * Class Push
 * @package Getui
 */
class Push
{
    use ApiTrait;

    /**
     * 单推 Client ID
     * @param array $cid
     * @param  $message
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function toSingleCid(array $cid, $message)
    {
        $withData = $this->getWithData($message, ['cid' => $cid]);
        $data = (new HttpRequest())->withApi('/push/single/cid')
            ->withMethod('POST')
            ->withConfig($this->config)
            ->withToken($this->auth)
            ->withData($withData)
            ->send();
        if (!(isset($data['msg']) && $data['msg'] === 'success' && isset($data['code']) && $data['code'] === 0)) {
            throw new \Exception(isset($data['msg']) ? $data['msg'] : '接口错误');
        }
        return $data;
    }


    /**
     * 推送消息到所有用户
     * @param  $message
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function toAll($message)
    {
        $withData = $this->getWithData($message, 'all');
        return (new HttpRequest())
            ->withApi('/push/all')
            ->withMethod('POST')
            ->withConfig($this->config)
            ->withToken($this->auth)
            ->withData($withData)
            ->send();
    }


    /**
     * @param $message
     * @param $audience
     * @return array
     */
    public function getWithData($message, $audience)
    {
        $pushMessage = $message->setPushMessage();
        $message = $message->toArray();
        $withData = [
            'request_id'   => rand(11111100000, 9999999900009),
            'settings'     => [
                'ttl' => 3600000
            ],
            'audience'     => $audience,
            'push_message' => $pushMessage,
            'push_channel' => [
                'android' => ['ups' => $pushMessage],
                'ios'     => [
                    'type'       => 'notify',
                    'payload'    => json_encode($message['notification']['payload']),
                    'aps'        => [
                        'alert'             => [
                            'title' => $message['notification']['title'],
                            'body'  => $message['notification']['body'],
                        ],
                        'content-available' => 0
                    ],
                    "auto_badge" => "+1"
                ]
            ]
        ];

        return $withData;
    }

    /**
     * 单推 Alias
     * @param array $alias
     * @param  $message
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function toSingleAlias(array $alias, $message)
    {
        $withData = $this->getWithData($message, ['alias' => $alias]);
        return (new HttpRequest())->withApi('/push/single/alias')
            ->withMethod('POST')
            ->withConfig($this->config)
            ->withToken($this->auth)
            ->withData($withData)->send();
    }


}
