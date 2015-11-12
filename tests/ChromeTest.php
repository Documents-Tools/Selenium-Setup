<?php
namespace tests;

use Facebook\WebDriver\WebDriverBy;
use tests\helpers\BrowserTestCase;

class ChromeTest extends BrowserTestCase
{
    public function setUp()
    {
        $this->envSetup(
            getenv('seleniumServerHost'),
            getenv('seleniumServerPort'),
            'chrome'
        );
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
