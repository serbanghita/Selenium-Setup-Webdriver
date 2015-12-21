**Selenium-Setup-Webdriver** is used to test the `Selenium-Setup` service implementation. 
It can also be used in testing environments, since it provides a `WebDriver` and `WebDriverConfig` factories.
It also comes with a `BrowserTestCase` that you can use by extending your test cases.

# Install

#### Install [`Selenium-Setup`](https://github.com/bogdananton/Selenium-Setup)

1. `git clone https://github.com/bogdananton/Selenium-Setup.git`
1. `cd Selenium-Setup`
1. `composer install`
1. `php selenium-setup start` - will start the default Selenium server
    1. Alternatively use `php selenium-setup register yourServer` and change `yourServer.json` to your needs.

#### Install `Selenium-Setup-Webdriver`

1. `git clone https://github.com/serbanghita/Selenium-Setup-Webdriver.git`
1. `cd Selenium-Setup-Webdriver`
1. `composer install`
1. `phpunit -c phpunit.xml` - will perform the checks from [tests](tests)
    1. Tinker with `phpunit.xml` if you want fast changes in your setup. Eg. connecting to a different Selenium host and port.

Now that you have validated your environment setup, you have two options:

1. Use `Selenium-Setup-Webdriver` as a dependency in your test project. When writing tests, extend `SeleniumSetupWebDriver\TestCase\BrowserTestCase`.
1. Use your own web driver setup and connect to the server(s) raised by `Selenium-Setup`.
