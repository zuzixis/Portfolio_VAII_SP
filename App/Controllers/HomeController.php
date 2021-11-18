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
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'message' => $this->request()->getValue('message')
            ]
        );
    }

}