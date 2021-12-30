<?php
namespace App\Models;

use App\Auth;
use App\Core\Model;

class File extends Model
{
    public function __construct(
        public int $id = 0,
        public int $user_id = 0,
        public string $title = "",
        public string $file = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'user_id','title', 'file'];
    }

    static public function setTableName()
    {
        return "user_files";
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
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    public static function addNewFile(string $title, string $file){
        if (Auth::isLogged() && $_SESSION['id']>0){
            $newFile = new File(user_id: $_SESSION['id'],title: $title,file: $file);
            $newFile->save();
            return true;
        }
        return false;
    }

    public static function deteteFile(int $id){
        if (Auth::isLogged() && $_SESSION['id']>0 && $id > 0){
            $file = File::getOne($id);
            $path = \App\Config\Configuration::FILES_DIR . $file->getFile();
            if (file_exists($path)) {
                chmod($path, 0644);
                unlink($path);
                $file->delete();
            }
            return true;
        }
        return false;
    }


}