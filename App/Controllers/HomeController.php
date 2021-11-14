<?php

namespace App\Controllers;

use App\Models\Blog;


/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        return $this->html();
    }


    public function readBlog(){
        $blogId = $this->request()->getValue('blogId');

        if ($blogId > 0){
            //precitaj blog - otvoriť v

        }
        $this->redirect('home');
    }
}