<?php

namespace App;

use App\Models\User;

class Auth
{
    public static function login($login, $password)
    {

        $found = User::getAll('email like "'.$login.'" AND password like "'.$password.'"');

        if ($found != null)
        {
            foreach ($found as $user) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['name'] = $user->getName()." ".$user->getSurname();
            }
            return true;
        }else{
            return false;
        }
    }



    public static function isLogged(){
        return isset($_SESSION['id']);
    }

    public static function getName(){
        return (Auth::isLogged() ? $_SESSION['name'] : "");
    }

    public static function logout(){
        unset($_SESSION['name']);
        session_destroy();
    }
}