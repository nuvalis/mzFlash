<?php

namespace nuvalis\Flash;

require_once(__DIR__ . '/../../src/Flash/Message.php');

class MessageTest extends \PHPUnit_Framework_TestCase
{
    private $messages;
    
    function SetUp() 
    {
        $this->flash = new Message();
    }

    function TearDown()
    {
        unset($_SESSION["flash"]);
    }

    /**
     * Set Error Message
     *
     * @param Message string
     **/
    public function testError()
    {
        $this->flash->error("testError");
        $this->assertEquals("testError", $_SESSION["flash"]["messages"]["error"][0]);
    }

    /**
     * Set Warning Message
     *
     * @param Message string
     **/
    public function testWarning()
    {
        $this->flash->warning("testWarning");
        $this->assertEquals("testWarning", $_SESSION["flash"]["messages"]["warning"][0]);
    }

    /**
     * Set Success Message
     *
     * @param Message string
     **/
    public function testSuccess()
    {
        $this->flash->success("testSuccess");
        $this->assertEquals("testSuccess", $_SESSION["flash"]["messages"]["success"][0]);
    }

    /**
     * Set Extra Message Type
     *
     * @param Message string
     **/
    public function testMessage()
    {

        $this->flash->message("testMessage");
        $this->assertEquals("testMessage", $_SESSION["flash"]["messages"]["message"][0]);

    }
    
    /**
     * Clears flash array
     *
     * @return void
     **/
    public function testCleanUp() 
    {

        $this->flash->cleanUp();
        $this->assertEquals(null, $_SESSION["flash"]);
                
    }

    /**
     * Renders messages as HTML for output later on.
     *
     * @return string of HTML or false
     **/
    public function testShowMessages() 
    {
        // Adding Stuff to Array
        $this->flash->message("testMessage");
        $this->flash->error("testError");

        $message = "Rendering Error, Check your HTML Output";

        $matcher = [
            "tag" => "section",
            'attributes' => array('class' => 'flash-messages'),
            'child' => array('tag' => 'div', 'class' => 'inner')
        ];

        $render = $this->flash->show();
        $this->assertTag($matcher, $render, $message);
        $this->assertEquals(null, $_SESSION["flash"], "Didn't clean flash array after.");

    }

    /**
     * Renders messages as HTML for output later on.
     *
     * @return string of HTML or false
     **/
    public function testShowEmptyMessages() 
    {
        $render = $this->flash->show();
        $this->assertEquals(false, $render);
    }
}