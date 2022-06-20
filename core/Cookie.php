<?php
/**class Cookie*/

namespace app\core;

class Cookie{
    public function setCookie(string $key, mixed $value,int $timeToExpire){
        setcookie($key, $value, $timeToExpire);
    }

    public function removeCookie(string $key){
        setcookie($key, '', -1);
    }

    public function getCookie(string $key){
        return $_COOKIE[$key];
    }
}