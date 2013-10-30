<?php

class FacebookLoginTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $this->setBrowser('firefox'); //ブラウザ指定
        //$this->setBrowser("ie");
        //$this->setBrowser("chrome");
        //$this->setHost('127.0.0.1');
        $this->setHost('192.168.1.147'); //Selenium Server Host
        $this->setPort(4444); //Selenium Server Port
        $this->setBrowserUrl('https://www.facebook.com/'); //Setting URL
    }
    
    /** 
     * Method testFacebookLogin 
     * @test 
     */ 
    public function testFacebookLogin()
    {
        $this->url("/");
        sleep(3);  //IEでの動作でSeleniumが高速過ぎるため描画タイミングがずれる
        $this->byId("email")->value("facebook@gmail.com"); //facebook Email
        $this->byId("pass")->value("xxxxx"); //facebook password
        $this->byId("loginbutton")->click();
        sleep(10);
        $this->byId("userNavigationLabel")->click();
        $this->byCssSelector("input[type=\"submit\"]")->click();
    }

}
