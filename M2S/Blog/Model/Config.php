<?php


namespace M2S\Blog\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
class Config
{
    const XML_PATH_ENABLED = 'm2s/general/enabled';
    const XML_PATH_CRON_EXPRESSION = 'm2s/general/cron_expression';

    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnabled()
    {
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }

}
