<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;
use App\Models\Blog;
use App\Models\User;

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm(){
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function registration(){
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function addNewUser(){
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');
        $password_repeat = $this->request()->getValue('password-repeat');

        if ($password == $password_repeat){
            $registered = Auth::register($email,$password);
            if ($registered){
                $this->redirect('portfolio','editProfil');
            }else{
                $this->redirect('auth','registration', ['error' => \App\Config\Configuration::USER_ALREADY_EXISTS]);
            }
        }else{
            $this->redirect('auth','registration', ['error' => \App\Config\Configuration::DIFFERENT_PASSWORDS]);
        }

    }

    public function login()
    {
        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');

        $logged = Auth::login($login,$password);

        if ($logged){
            $this->redirect('home');
        }else{
            $this->redirect('auth','loginForm', ['error' => \App\Config\Configuration::ERR_LOGIN]);
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }

    public function deleteProfil()
    {
        $user = User::getOne($_SESSION['id']);

        if ($user != null){
            $user->delete();
        }

        unset($_SESSION['id']);
        session_destroy();

        $this->redirect('home',);
    }
}