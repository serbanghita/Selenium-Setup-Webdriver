<?php
namespace SeleniumSetupWebDriver\WebDriver\Config;

class WebDriverConfigFactory
{
    public static function createFromEnv()
    {
        $config = new WebDriverConfig();
        $config->setSeleniumServerHost(getenv('seleniumServerHost'))
            ->setSeleniumServerPort(getenv('seleniumServerPort'))
            ->setBrowserName(getenv('browserName'))
            ->setBrowserProxyHost(getEnv('browserProxyHost'))
            ->setBrowserProxyPort(getEnv('browserProxyPort'));

        return $config;
    }
}