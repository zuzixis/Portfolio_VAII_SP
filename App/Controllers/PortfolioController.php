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
        $user = null;

        if (Auth::isLogged()){
            $user = User::getOne($_SESSION['id']);
        }

        return $this->html(
            [
                'users' => $users,
                'user'=> $user
            ]);
    }

    public function editProfil(){
        if (Auth::isLogged()){
            $user = User::getOne($_SESSION['id']);

            return $this->html(
                [
                    'user' => $user,
                    'error' => $this->request()->getValue('error')
                ]);
        }
    }

    public function editSkills(){
        if (Auth::isLogged() && $_SESSION['id'] > 0){
                $user = User::getOne($_SESSION['id']);
                $skills = Skill::getAll();

                return $this->html(
                    [
                        'user' => $user,
                        'skills' => $skills
                    ]);
        }else{
            $this->redirect('home');
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
                    'projects' => $projects,
                    'error' => $this->request()->getValue('error'),
                    'message' => $this->request()->getValue('message')
                ]);
        }
    }

    public function addProject()
    {
        if (Auth::isLogged()){
            return $this->html(
                [
                    'error' => $this->request()->getValue('error'),
                    'message' => $this->request()->getValue('message')
                ]
            );
        }else{
            $this->redirect('home' );
        }
    }

    public function update(){

        $name = $this->request()->getValue('name');
        $surname = $this->request()->getValue('surname');
        $number = $this->request()->getValue('number');
        $facebook = $this->request()->getValue('facebook');
        $instagram = $this->request()->getValue('instagram');
        $location = $this->request()->getValue('location');
        $basicInfo = $this->request()->getValue('basicInfo');
        $profilPhoto = "";

        $passwordFirst = $this->request()->getValue('password-first');
        $passwordSecond = $this->request()->getValue('password-second');

        if ($passwordFirst == $passwordSecond){
            if ($_FILES['profil-photo']['name'] != ""){
                if ($_FILES['profil-photo']['error'] == UPLOAD_ERR_OK) {
                    $profilPhoto = date("Y-m-d-H-m-s_").$_FILES['profil-photo']['name'];
                    $path = \App\Config\Configuration::PROFIL_PHOTO_DIR."$profilPhoto";
                    move_uploaded_file($_FILES['profil-photo']['tmp_name'], $path);
                }
            }

            if (User::update($name, $surname, $number, $facebook, $instagram, $location,
                $basicInfo, $profilPhoto, $passwordFirst)){
                $this->redirect('portfolio','profil',
                    [
                        'userId' => $_SESSION['id'],
                        'message' => \App\Config\Configuration::SUCCESSFULLY_UPDATED_PROFIL
                    ] );
            }else{
                $this->redirect('portfolio','profil',
                    [
                        'userId' => $_SESSION['id'],
                        'error' => \App\Config\Configuration::ERR_UPDATING_PROFIL
                    ] );
            }
        }else{
            $this->redirect('portfolio','editProfil',
                [
                    'userId' => $_SESSION['id'],
                    'error' => \App\Config\Configuration::DIFFERENT_PASSWORDS
                ] );
        }
    }

    public function addSkills(){
        if (Auth::isLogged() && $_SESSION['id']>0){
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

            $this->redirect('portfolio','profil',
                [
                    'userId' => $_SESSION['id'],
                    'message' => \App\Config\Configuration::SUCCESSFULLY_UPDATED_SKILLS
                ] );

        }else{
            $this->redirect('portfolio','profil',
                [
                    'userId' => $_SESSION['id'],
                    'error' => \App\Config\Configuration::ERR_UPDATING_SKILLS
                ] );
        }
    }

    public function addNewProject()
    {
        if (Auth::isLogged()){
            $title = $this->request()->getValue('title');

            if ($_FILES['project']['error'] == UPLOAD_ERR_OK) {
                $img = date("Y-m-d-H-m-s_").$_FILES['project']['name'];
                $path = \App\Config\Configuration::PROJECTS_DIR.$img;
                move_uploaded_file($_FILES['project']['tmp_name'], $path);
                if (Project::addNewProject($title,$img)){
                    $this->redirect('portfolio','addProject' ,
                        [
                            'message' => \App\Config\Configuration::SUCCESSFULLY_ADDED_PROJECT
                        ]);
                }else{
                    $this->redirect('portfolio','addProject' ,
                        [
                            'error' => \App\Config\Configuration::ERR_ADDING_PROJECT
                        ]);
                }

            }else{
                $this->redirect('portfolio','addProject' ,
                    [
                        'error' => \App\Config\Configuration::ERR_ADDING_PROJECT
                    ]);
            }

        }else{
            $this->redirect('home' );
        }

    }

    public function deleteProject()
    {
        if (Auth::isLogged()){
            $idProject = $this->request()->getValue('id');

            if (Project::deteteProject($idProject)){
                $this->redirect('portfolio','profil',
                    [
                        'userId' => $_SESSION['id'],
                        'message' => \App\Config\Configuration::SUCCESSFULLY_DELETED_PROJECT
                    ] );
            }else{
                $this->redirect('portfolio','profil',
                    [
                        'userId' => $_SESSION['id'],
                        'error' => \App\Config\Configuration::ERR_DElETING_PROJECT
                    ] );
            }
        }else{
            $this->redirect('home');
        }
    }







}