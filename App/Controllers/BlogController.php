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
            $blog->setUserName($user->getName()." ".$user->getSurname());

        }

        return $this->html(
            [
                'blogs' => $blogs
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

        $newBlog = new Blog(title: $title,text: $text ,user_id: $_SESSION["id"] );
        $newBlog->save();

        $this->redirect('blog','blogBlogs');
    }

    public function update(){
        $title = $this->request()->getValue('title');
        $text = $this->request()->getValue('text');
        $id = $this->request()->getValue('id');
        $blog = Blog::getOne($id);
        $blog->setTitle($title);
        $blog->setText($text);
        $blog->save();
        $this->redirect('blog','blogBlogs');
    }

    public function delete(){
        $id = $this->request()->getValue('blogId');
        $blog = Blog::getOne($id);

        if ($blog != null){
            $blog->delete();
        }

        $this->redirect('blog','blogBlogs');
    }


}