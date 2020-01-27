<?php


class Utils
{
    public static function borrarSession($name)
    {
       if (isset($_SESSION[$name])) {
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
       }
       return $name;
    }
    
}
