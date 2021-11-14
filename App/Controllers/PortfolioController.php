<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;

class PortfolioController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function portfolios(){
        $users = User::getAll();

        return $this->html(
            [
                'users' => $users
            ]);
    }

    public function profil(){
        $userId = $this->request()->getValue('userId');
        if ( $userId > 0 ){
            $user = User::getOne($userId);
            $skills = Skill::getAll("id in(SELECT skill_id FROM user_skills WHERE user_id = $userId )");
            $blogs = Blog::getAll("user_id = $userId");
            $projects = Project::getAll("user_id = $userId");

            return $this->html(
                [
                    'user' => $user,
                    'skills' => $skills,
                    'blogs' => $blogs,
                    'projects' => $projects
                ]);
        }
    }


}