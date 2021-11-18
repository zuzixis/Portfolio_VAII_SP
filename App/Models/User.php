<?php
namespace App\Models;
use App\Auth;
use App\Core\Model;

class User extends Model
{

    public function __construct(
        public int $id = 0,
        public string $name = "",
        public string $surname = "",
        public string $number = "",
        public string $email = "",
        public string $password = "",
        public string $facebook = "",
        public string $instagram = "",
        public string $location = "",
        public string $basic_info = "",
        public string $profil_photo = "user.png"
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name','surname', 'number', 'email', 'password','facebook','instagram','location', 'basic_info','profil_photo'];
    }

    static public function setTableName()
    {
        return  "users";
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFacebook(): string
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook(string $facebook): void
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getInstagram(): string
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getBasicInfo(): string
    {
        return $this->basic_info;
    }

    /**
     * @param string $basic_info
     */
    public function setBasicInfo(string $basic_info): void
    {
        $this->basic_info = $basic_info;
    }


    /**
     * @return string
     */
    public function getProfilPhoto(): string
    {
        return $this->profil_photo;
    }

    /**
     * @param string $profil_photo
     */
    public function setProfilPhoto(string $profil_photo): void
    {
        $this->profil_photo = $profil_photo;
    }

    public static function update(
        string $name, string $surname, string $number, string $facebook, string $instagram,
        string $location, string $basicInfo, string $profilPhoto, string $password
    ){
        if (Auth::isLogged() && $_SESSION['id'] > 0){
            $user = User::getOne($_SESSION['id']);

            $user->setName($name);
            $user->setSurname($surname);
            $user->setNumber($number);
            $user->setFacebook($facebook);
            $user->setInstagram($instagram);
            $user->setLocation($location);
            $user->setBasicInfo($basicInfo);
            $user->setPassword($password);

            if ($profilPhoto != ""){
                $user->setProfilPhoto($profilPhoto);
            }

            $user->save();

            return true;
        }

        return false;
    }
}