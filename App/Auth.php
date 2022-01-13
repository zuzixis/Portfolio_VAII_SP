<?php

namespace App;

use App\Models\Blog;
use App\Models\Project;
use App\Models\User;
use App\Models\UserSkill;

function test_input(mixed $data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

class Auth
{
    public static function login($login, $password)
    {

        $found = User::getAll("email = ?", [ $login ]); //proti útoku
        //$found = User::getAll('email like "'.$login.'"');

        if ($found != null)
        {
            foreach ($found as $user) {
                if (password_verify($password, $user->getPassword())){
                    $_SESSION['id'] = $user->getId();
                    return true;
                }else{
                    return false;
                }
            }
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
        $found = User::getAll("email = ?", [ $email ]);

        //kontrola na strane servera
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if (strlen($password) < 8){
            return false;
        }
        if(!preg_match('/[A-Z]/', $password)){
            return false;
        }
        if(!preg_match('/[0-9]/', $password)){
            return false;
        }

        if ($found == null)
        {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $newUser = new User(email: $email, password: $pass );
            $newUser->save();
            self::login($email,$password);
            return true;
        }else{
            return false;
        }
    }

    public static function deleteProfil()
    {
        $found = User::getOne($_SESSION['id']);

        if ($found != null){
            //vymazenie všetkého čo user môže mať vytvorené

            //vymazanie blogov
            $blogs = Blog::getAll("user_id = ?" ,[ $found->getId() ]);
            foreach ($blogs as $blog){
                $blog->delete();
            }

            //vymazanie projektov
            $projects = Project::getAll("user_id = ?" ,[ $found->getId() ]);
            foreach ($projects as $project){
                $path = \App\Config\Configuration::PROJECTS_DIR . $project->getImage();
                if (file_exists($path)) {
                    chmod($path, 0644);
                    unlink($path);
                }
                $project->delete();
            }

            //vymazanie skillov
            $skills = UserSkill::getAll("user_id = ?" ,[ $found->getId() ]);
            foreach ($skills as $skill){
                $skill->delete();
            }

            //odhlásenie sa
            self::logout();

            //vymaanie usera

            if ($found->getProfilPhoto() != \App\Config\Configuration::PROFIL_DEFAULT_PHOTO){
                $path = \App\Config\Configuration::PROFIL_PHOTO_DIR . $found->getProfilPhoto();
                if (file_exists($path)) {
                    chmod($path, 0644);
                    unlink($path);
                }
            }

            $found->delete();

            return true;
        }else{
            return false;
        }

    }
}