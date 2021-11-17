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
        unset($_SESSION['id']);
        session_destroy();
    }

    public static function register(mixed $email, mixed $password)
    {
        $found = User::getAll('email like "'.$email.'"');

        if ($found == null)
        {
            $newUser = new User(email: $email, password: $password );
            $newUser->save();
            self::login($email,$password);
            return true;
        }else{
            return false;
        }

    }
}