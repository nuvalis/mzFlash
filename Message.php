<?php

namespace nuvalis\Flash;

class Message 
{
    private $messages;
    
    function __construct()
    {
   
        if(!isset($_SESSION['flash'])) 
        {
            $_SESSION['flash'] = array();
            $_SESSION['flash']['uri'] = $_SERVER['REQUEST_URI'];
        }

    }
    
    public function error($message)
    {
    	$_SESSION['flash']['messages']['error'][] = $message;
    }

    public function warning($message)
    {
    	$_SESSION['flash']['messages']['warning'][] = $message;
    }

    public function success($message)
    {
    	$_SESSION['flash']['messages']['success'][] = $message;
    }

    public function message($message)
    {
    	$_SESSION['flash']['messages']['message'][] = $message;
    }
    
    public function cleanUp() 
    {
        
        $_SESSION['flash'] = null;
        
    }

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