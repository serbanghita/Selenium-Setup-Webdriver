<?php
namespace SeleniumSetupTests;

use Facebook\WebDriver\WebDriverBy;
use SeleniumSetupWebDriver\TestCase\BrowserTestCase;
use SeleniumSetupWebDriver\WebDriver\Config\WebDriverConfigFactory;
use SeleniumSetupWebDriver\WebDriver\WebDriverFactory;

class PhantomJSTest extends BrowserTestCase
{
    public function setUp()
    {
        $config = WebDriverConfigFactory::createFromEnv();
        $config->setBrowserName('phantomjs');
        $this->webDriver = WebDriverFactory::create($config);
    }

    /**
     * Page has title.
     */
    public function testPageHasTitle()
    {
        $this->webDriver->get('https://github.com');
        self::assertContains('GitHub', $this->webDriver->getTitle());
    }

    /**
     * Page has 25 items.
     */
    public function testPageHas25Items()
    {
        $this->webDriver->get('https://github.com/trending?l=php');
        self::assertCount(25, $this->webDriver->findElements(WebDriverBy::className('repo-list-item')));
    }
}
