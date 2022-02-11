<?php

namespace Wtf10029\Getui\Message;

class ChangeMessage implements MessageInterface
{
    const CLICK_TYPE_INTENT = "intent";
    const CLICK_TYPE_URL = "url";
    const CLICK_TYPE_START_APP = "startapp";
    const CLICK_TYPE_PAYLOAD = "payload";
    const CLICK_TYPE_NONE = "none";

    protected $data = [];

    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    /**
     * 第三方厂商通知标题，长度 ≤ 50
     */
    private $title;
    /**
     * 第三方厂商通知内容，长度 ≤ 256
     */
    private $body;
    /**
     * @see com.gt.sdk.dto.CommonEnum.ClickTypeEnum
     * 点击通知后续动作,
     * 目前支持5种后续动作，
     * intent：打开应用内特定页面，
     * url：打开网页地址，
     * payload：启动应用加自定义消息内容，
     * startapp：打开应用首页，
     * none：纯通知，无后续动作
     */
    private $clickType;

    /**
     * 点击通知打开应用特定页面，长度 ≤ 2048;
     * 示例：intent:#Intent;component=你的包名/你要打开的 activity 全路径;S.parm1=value1;S.parm2=value2;end
     */
    private $intent;
    /**
     * 点击通知打开链接，长度 ≤ 1024
     */
    private $url;
    /**
     * 点击通知加自定义消息，长度 ≤ 3072
     */
    private $payload;
    /**
     * 消息覆盖使用，两条消息的notify_id相同，新的消息会覆盖老的消息
     */
    private $notifyId;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        $this->data["title"] = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
        $this->data["body"] = $body;
    }

    public function getClickType()
    {
        return $this->clickType;
    }

    public function setClickType(string $clickType)
    {
        $this->clickType = $clickType;
        $this->data["click_type"] = $clickType;
    }

    public function getIntent()
    {
        return $this->intent;
    }

    public function setIntent(string $intent)
    {
        $this->intent = $intent;
        $this->data["intent"] = $intent;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        $this->data["url"] = $url;
    }


    public function getNotifyId()
    {
        return $this->notifyId;
    }

    public function setNotifyId(string $notifyId)
    {
        $this->notifyId = $notifyId;
        $this->data["notify_id"] = $notifyId;
    }

}