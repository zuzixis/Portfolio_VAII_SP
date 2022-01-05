<?php
namespace App\Models;

use App\Auth;
use App\Core\Model;



class Project extends Model
{

    public function __construct(
        public int $id = 0,
        public int $user_id = 0,
        public string $title = "",
        public string $image = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'user_id','title', 'image'];
    }

    static public function setTableName()
    {
        return "user_projects";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public static function addNewProject(string $title, string $img){
        if (Auth::isLogged() && $_SESSION['id']>0){
            $newProject = new Project(user_id: $_SESSION['id'],title: $title,image: $img);
            $newProject->save();
            return true;
        }
        return false;
    }

    public static function deteteProject(int $id){
        if (Auth::isLogged() && $_SESSION['id']>0 && $id > 0){
            //$project = Project::getOne($id);
            $found = Project::getAll("id = ?", [ $id ]);

            foreach ($found as $project) {
                $path = \App\Config\Configuration::PROJECTS_DIR . $project->getImage();
                if (file_exists($path)) {
                    chmod($path, 0644);
                    unlink($path);
                    $project->delete();
                }
                return true;
            }
        }
        return false;
    }
}