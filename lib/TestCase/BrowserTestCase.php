<?php
namespace SeleniumSetupWebDriver\TestCase;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use SeleniumSetupWebDriver\WebDriver\WebDriverFactory;

class BrowserTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var RemoteWebDriver */
    protected $webDriver;

    // Default setup.
    // Override this when needed.
    public function setUp()
    {
        $this->webDriver = WebDriverFactory::createFromEnv();
    }

    // Comment or override this to stop the
    // browser from closing.
    public function tearDown()
    {
        if ($this->webDriver instanceof RemoteWebDriver) {
            $this->webDriver->quit();
        }
    }


}
