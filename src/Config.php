<?php


namespace Wtf10029\Getui;

/**
 * Class Config
 * @package Getui
 */
class Config
{
    protected $config = [];

    public function setAppId(string $appid): Config
    {
        $this->config['app_id'] = $appid;
        return $this;
    }

    /**
     * @param $appKey
     * @return $this
     */
    public function setAppKey(string $appKey): Config
    {
        $this->config['app_key'] = $appKey;
        return $this;
    }

    /**
     * @param string $masterSecret
     * @return $this
     */
    public function setMasterSecret(string $masterSecret): Config
    {
        $this->config['master_secret'] = $masterSecret;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMasterSecret()
    {
        return isset($this->config['master_secret']) ? $this->config['master_secret'] : null;
    }


    /**
     * @return string|null
     */
    public function getAppKey()
    {
        return isset($this->config['app_key']) ? $this->config['app_key'] : null;
    }

    /**
     * @return string|null
     */
    public function getAppId()
    {
        return isset($this->config['app_id']) ? $this->config['app_id'] : null;
    }
}