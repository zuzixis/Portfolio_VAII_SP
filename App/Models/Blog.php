<?php

namespace App\Models;

use App\Auth;
use App\Core\Model;

class Blog extends Model
{

    private string $userName = "";
    private string $userProfilPhoto = "";

    public function __construct(
        public int $id = 0,
        public ?string $title = null,
        public ?string $text = null,
        public int $user_id = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'title','text','user_id'];
    }

    static public function setTableName()
    {
        return "blogs";
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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
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
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserProfilPhoto(): string
    {
        return $this->userProfilPhoto;
    }

    /**
     * @param string $userProfilPhoto
     */
    public function setUserProfilPhoto(string $userProfilPhoto): void
    {
        $this->userProfilPhoto = $userProfilPhoto;
    }

    public static function createBlog(string $title, string $text)
    {
        if(Auth::isLogged()){
            $newBlog = new Blog(title: $title,text: $text ,user_id: $_SESSION["id"] );
            $newBlog->save();
            return true;
        }else{
            return false;
        }
    }

    public static function updateBlog(string $title, string $text, int $id)
    {
        if ($id > 0){
            if(Auth::isLogged()){
                $blog = Blog::getOne($id);
                $blog->setTitle($title);
                $blog->setText($text);
                $blog->save();
                return true;
            }
        }
        return false;
    }

    public static function deleteBlog(int $id)
    {
        if ($id > 0){
            if(Auth::isLogged()){
                $blog = Blog::getOne($id);
                $blog->delete();
                return true;
            }
        }
        return false;
    }
}