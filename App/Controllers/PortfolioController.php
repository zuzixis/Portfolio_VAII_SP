<?php

namespace App\Controllers;

use App\App;
use App\Auth;
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

    public function editProfil(){
        if (Auth::isLogged()){
            $user = User::getOne($_SESSION['id']);

            return $this->html(
                [
                    'user' => $user
                ]);
        }
    }

    public function editSkills(){
        if (Auth::isLogged()){
            $user = User::getOne($_SESSION['id']);
            $skills = Skill::getAll();

            return $this->html(
                [
                    'user' => $user,
                    'skills' => $skills
                ]);
        }
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

    public function update(){
        $user = User::getOne($_SESSION['id']);
        $name = $this->request()->getValue('name');
        $surname = $this->request()->getValue('surname');
        $number = $this->request()->getValue('number');
        $facebook = $this->request()->getValue('facebook');
        $instagram = $this->request()->getValue('instagram');
        $location = $this->request()->getValue('location');
        $basicInfo = $this->request()->getValue('basicInfo');


        if ($_FILES['profil-photo']['error'] == UPLOAD_ERR_OK) {
            $profilPhoto = date("Y-m-d-H-m-s_").$_FILES['profil-photo']['name'];
            $path = \App\Config\Configuration::PROFIL_PHOTO_DIR."$profilPhoto";
            move_uploaded_file($_FILES['profil-photo']['tmp_name'], $path);
            $user->setProfilPhoto($profilPhoto);
        }

        $user->setName($name);
        $user->setSurname($surname);
        $user->setNumber($number);
        $user->setFacebook($facebook);
        $user->setInstagram($instagram);
        $user->setLocation($location);
        $user->setBasicInfo($basicInfo);

        $user->save();
        $this->redirect('portfolio','profil',['userId' => $_SESSION['id']] );
    }

    public function addSkills(){
        $oldSkills = UserSkill::getAll("user_id =".$_SESSION['id']);

        foreach ($oldSkills as $skill){
            $skill->delete();
        }

        $allSkills = Skill::getAll();


        for ($i = 1; $i < count($allSkills)+1; $i++) {
            if ($_POST[$i] != null){
                $newSkill = new UserSkill(user_id: $_SESSION['id'],skill_id: $_POST[$i]);
                $newSkill->save();
            }
        }

        $this->redirect('portfolio','profil',['userId' => $_SESSION['id']] );



    }



}