<?php
/**
*    class Session
*/

namespace app\core;

use function app\core\encrypt;

class Session{

    private array $sessionTimeTable;

    function __construct()
    {
        $this->sessionTimeTable = array();
    }

    public function addSession(string $key, string $value, int $expireAfter){
        session_start();
        $this->sessionTimeTable[$key] = $expireAfter;
        $_SESSION[$key] = $value;
    }
    
     public function getSessionValue(string $key){
        if ($this->checkSession($key)){
            return $_SESSION[$key]??null;
        }
        return null;
    }

    public function checkSession(string $key ){

        // search for the key
        $found=false;

        foreach($this->sessionTimeTable as $skey=>$__){
            if ($skey===$key) $found=true;
        }
        if (!$found) return $found;

        if($this->sessionTimeTable[$key]<time()){
            $this->removeSession($key);
            return false;
        }
        
        return $found;
    }

    public function removeSession(string $key){
        $this->sessionTimeTable[$key] = null;
        $_SESSION[$key] = null;
    }
}