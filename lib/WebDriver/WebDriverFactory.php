<?php
namespace SeleniumSetupWebDriver\WebDriver;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use SeleniumSetupWebDriver\WebDriver\Config\WebDriverConfig;
use SeleniumSetupWebDriver\WebDriver\Config\WebDriverConfigFactory;

class WebDriverFactory
{
    public static function create(
        WebDriverConfig $config
    ) {
        if (!$config->isValid()) {
            throw new \Exception('Configuration is invalid. Check that all your properties are defined.');
        }

        $defaultBrowserCapabilities = [
            WebDriverCapabilityType::BROWSER_NAME => $config->getBrowserName(),
        ];

        $browserCapabilities = $config->getBrowserCapabilities();
        if (empty($browserCapabilities)) {
            if (!$config->getBrowserProxyHost() && !$config->getBrowserProxyPort()) {
                $config->setBrowserCapability(WebDriverCapabilityType::PROXY, [
                    'proxyType' => 'manual',
                    'httpProxy' => $config->getBrowserProxyHost() .':'. $config->getBrowserProxyPort(),
                    'sslProxy' => $config->getBrowserProxyHost() .':'. $config->getBrowserProxyPort()
                ]);
            }
        }

        $browserCapabilities = array_merge($defaultBrowserCapabilities, $config->getBrowserCapabilities());

        return RemoteWebDriver::create(
            sprintf('http://%s:%d/wd/hub', $config->getSeleniumServerHost(), $config->getSeleniumServerPort()),
            $browserCapabilities
        );
    }

    public static function createFromEnv()
    {
        $config = WebDriverConfigFactory::createFromEnv();
        return self::create($config);
    }

    public static function createChromeMobile()
    {
        // For Chrome.
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, [
            'mobileEmulation' => ['deviceName' => 'Google Nexus 5']
        ]);

        $config = WebDriverConfigFactory::createFromEnv();
        $config->setBrowserCapabilities($capabilities->toArray());
        return self::create($config);
    }
}