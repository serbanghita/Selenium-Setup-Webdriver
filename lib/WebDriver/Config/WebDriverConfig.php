<?php
namespace SeleniumSetupWebDriver\WebDriver\Config;

class WebDriverConfig
{
    protected $seleniumServerHost;
    protected $seleniumServerPort;
    protected $browserName;
    protected $browserProxyHost = null;
    protected $browserProxyPort = null;
    protected $browserCapabilities = [];

    /**
     * @return mixed
     */
    public function getSeleniumServerHost()
    {
        return $this->seleniumServerHost;
    }

    /**
     * @param mixed $seleniumServerHost
     * @return WebDriverConfig
     */
    public function setSeleniumServerHost($seleniumServerHost)
    {
        $this->seleniumServerHost = $seleniumServerHost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeleniumServerPort()
    {
        return $this->seleniumServerPort;
    }

    /**
     * @param mixed $seleniumServerPort
     * @return WebDriverConfig
     */
    public function setSeleniumServerPort($seleniumServerPort)
    {
        $this->seleniumServerPort = $seleniumServerPort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrowserName()
    {
        return $this->browserName;
    }

    /**
     * @param mixed $browserName
     * @return WebDriverConfig
     */
    public function setBrowserName($browserName)
    {
        $this->browserName = $browserName;
        return $this;
    }

    /**
     * @return null
     */
    public function getBrowserProxyHost()
    {
        return $this->browserProxyHost;
    }

    /**
     * @param null $browserProxyHost
     * @return WebDriverConfig
     */
    public function setBrowserProxyHost($browserProxyHost)
    {
        $this->browserProxyHost = $browserProxyHost;
        return $this;
    }

    /**
     * @return null
     */
    public function getBrowserProxyPort()
    {
        return $this->browserProxyPort;
    }

    /**
     * @param null $browserProxyPort
     * @return WebDriverConfig
     */
    public function setBrowserProxyPort($browserProxyPort)
    {
        $this->browserProxyPort = $browserProxyPort;
        return $this;
    }

    /**
     * @return array
     */
    public function getBrowserCapabilities()
    {
        return $this->browserCapabilities;
    }

    /**
     * @param array $browserCapabilities
     * @return WebDriverConfig
     */
    public function setBrowserCapabilities($browserCapabilities)
    {
        $this->browserCapabilities = $browserCapabilities;
        return $this;
    }

    public function setBrowserCapability($name, $value)
    {
        $this->browserCapabilities[$name] = $value;
        return $this;
    }

    public function getBrowserCapability($name)
    {
        return isset($this->browserCapabilities[$name]) ? $this->browserCapabilities[$name] : null;
    }


    public function isValid()
    {
        if (!$this->getSeleniumServerHost() || !$this->getSeleniumServerPort() || !$this->getBrowserName()) {
            return false;
        }

        return true;
    }
}