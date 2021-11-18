<?php

namespace App\Config;

/**
 * Class Configuration
 * Main configuration for the application
 * @package App\Config
 */
class Configuration
{
    public const DB_HOST = 'localhost';
    public const DB_NAME = 'dtb_portfolio';
    public const DB_USER = 'root';
    public const DB_PASS = 'dtb456';

    public const LOGIN_URL = '?c=auth&a=loginForm';

    public const ROOT_LAYOUT = 'root.layout.view.php';

    public const DEBUG_QUERY = false;

    public const IMG_DIR = 'public/files/img/';
    public const SKILLS_DIR = 'public/files/skills/';
    public const PROFIL_PHOTO_DIR = 'public/files/profil_photos/';
    public const PROFIL_DEFAULT_PHOTO = 'user.png';
    public const PROJECTS_DIR= 'public/files/projects/';
    public const STYLE = 'public/style.css';
    public const SKRIPT = '';

    public const USER_ALREADY_EXISTS = "Užívateľ so zadaným emailom už existuje!";
    public const DIFFERENT_PASSWORDS = "Zadané heslá sa nezhodujú!";
    public const ERR_LOGIN = "Zlý email alebo heslo!";
    public const ERR_PROJECT = "Nezvolili ste žiadnu fotku!";

    public const SUCCESSFULLY_DELETED_PROFIL = "Úspešné vymazaie profilu!";
    public const ERR_DELETING_PROFIL = "Pri mazaní profilu nastala chyba!";

    public const SUCCESSFULLY_CREATED_BLOG = "Nový blog sa úspešne vytvoril";
    public const ERR_CREATING_BLOG = "Pri vytváraní blogu nastala chyba!";

    public const SUCCESSFULLY_UPDATED_BLOG = "Blog sa úspešne upravil.";
    public const ERR_UPDATING_BLOG = "Pri úprave blogu nastala chyba.";

    public const SUCCESSFULLY_DELETED_BLOG = "Blog sa úspešne vymazal.";
    public const ERR_DELETING_BLOG = "Pri mazaní blogu nastala chyba!";

    public const SUCCESSFULLY_UPDATED_PROFIL = "Profil sa úspešne upravil";
    public const ERR_UPDATING_PROFIL = "Pri úprave profilu nastala chyba!";

    public const SUCCESSFULLY_UPDATED_SKILLS = "Skilly sa úspešne pridali.";
    public const ERR_UPDATING_SKILLS = "Pri úprave skillov nastala chyba!";

    public const SUCCESSFULLY_ADDED_PROJECT = "Projekt sa úspešne pridal do portfólia.";
    public const ERR_ADDING_PROJECT = "Pri načítaní nastala chyba!";

    public const SUCCESSFULLY_DELETED_PROJECT = "Projekt sa úspešne vymazal z portfólia.";
    public const ERR_DElETING_PROJECT = "Pri vymazávaní projektu nastala chyba!";


}