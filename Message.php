<?php

namespace nuvalis\mzFlash;

class Message 
{
    private $messages;
    
    function __construct()
    {
        
        // Setting up flash array in session
        if(!isset($_SESSION['flash'])) 
        {
            $_SESSION['flash'] = array();
            $_SESSION['flash']['uri'] = $_SERVER['REQUEST_URI'];
        }

    }

    /**
     * Set Error Message
     *
     * @param Message string
     **/
    public function error($message)
    {
        $_SESSION['flash']['messages']['error'][] = $message;
    }

    /**
     * Set Warning Message
     *
     * @param Message string
     **/
    public function warning($message)
    {
        $_SESSION['flash']['messages']['warning'][] = $message;
    }

    /**
     * Set Success Message
     *
     * @param Message string
     **/
    public function success($message)
    {
        $_SESSION['flash']['messages']['success'][] = $message;
    }

    /**
     * Set Extra Message Type
     *
     * @param Message string
     **/
    public function message($message)
    {
        $_SESSION['flash']['messages']['message'][] = $message;
    }
    
    /**
     * Clears flash array
     *
     * @return void
     **/
    public function cleanUp() 
    {
        
        $_SESSION['flash'] = null;
        
    }

    /**
     * Renders messages as HTML for output later on.
     *
     * @return string of HTML or false
     **/
    public function show() 
    {
            
      if(isset($_SESSION['flash']['messages'])) {
        
        $this->messages = "<section class='flash-messages'><div class='inner'>";

            if(isset($_SESSION['flash']['messages']["error"])){
        
                foreach($_SESSION['flash']['messages']["error"] as $type => $msg)
                {

                $this->messages .= "<div class='flash error'>$msg</div>";

                }
            }

            if(isset($_SESSION['flash']['messages']["success"])){

                foreach($_SESSION['flash']['messages']["success"] as $type => $msg)
                {

                $this->messages .= "<div class='flash success'>$msg</div>";

                }

            }

            if(isset($_SESSION['flash']['messages']["warning"])){

                foreach($_SESSION['flash']['messages']["warning"] as $type => $msg)
                {

                $this->messages .= "<div class='flash warning'>$msg</div>";

                }

            }

            if(isset($_SESSION['flash']['messages']["message"])){

                foreach($_SESSION['flash']['messages']["message"] as $type => $msg)
                {

                $this->messages .= "<div class='flash message'>$msg</div>";

                }

            }
        
        $this->messages .= "</div></section>";      
        $this->cleanUp();
        return $this->messages;
              
      }

      return false;
      
    }

}