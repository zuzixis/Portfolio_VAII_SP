<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Blog;
use App\Models\User;

class BlogController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {

    }

    public function article(){
        $blogId = $this->request()->getValue('id');
        $blog = Blog::getOne($blogId);
        $user = User::getOne($blog->getUserId());

        return $this->html(
            [
                'blog' => $blog,
                'user' => $user
            ]);
    }

    public function blogBlogs(){
        $blogs = Blog::getAll();

        foreach ($blogs as $blog)
        {
            $user = User::getOne($blog->getUserId());
            $blog->setUserProfilPhoto($user->getProfilPhoto());
            $blog->setUserName($user->getName() . " " . $user->getSurname());

        }

        return $this->html(
            [
                'blogs' => $blogs,
                'error' => $this->request()->getValue('error'),
                'message' => $this->request()->getValue('message')
            ]);
    }

    public function blogBloggers(){
        $users = User::getAll("id IN (SELECT user_id FROM blogs)");

        return $this->html(
            [
                'users' => $users
            ]);
    }

    public function createNewBlog(){

        return $this->html();
    }

    public function updateBlog(){
        $blogId = $this->request()->getValue('blogId');
        $blog = Blog::getOne($blogId);

        return $this->html(
            [
                'blog' => $blog
            ]);
    }

    public function createBlog(){
        $title = $this->request()->getValue('title');
        $text = $this->request()->getValue('text');

        if (Blog::createBlog($title,$text)){
            $this->redirect('blog','blogBlogs', ['message' => \App\Config\Configuration::SUCCESSFULLY_CREATED_BLOG]);
        }else{
            $this->redirect('blog','blogBlogs', ['error' => \App\Config\Configuration::ERR_CREATING_BLOG]);
        }

    }

    public function update(){
        $title = $this->request()->getValue('title');
        $text = $this->request()->getValue('text');
        $id = $this->request()->getValue('id');

        if (Blog::updateBlog($title,$text,$id)){
            $this->redirect('blog','blogBlogs', ['message' => \App\Config\Configuration::SUCCESSFULLY_UPDATED_BLOG]);
        }else{
            $this->redirect('blog','blogBlogs', ['error' => \App\Config\Configuration::ERR_UPDATING_BLOG]);
        }

    }

    public function delete(){
        $id = $this->request()->getValue('blogId');

        if ($id > 0){
            if (Blog::deleteBlog($id)){
                $this->redirect('blog','blogBlogs', ['message' => \App\Config\Configuration::SUCCESSFULLY_DELETED_BLOG]);
            }else{
                $this->redirect('blog','blogBlogs', ['error' => \App\Config\Configuration::ERR_DELETING_BLOG]);
            }
        }
    }


}