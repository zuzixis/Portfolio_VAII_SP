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
    public const PROJECTS_DIR= 'public/files/projects/';
    public const STYLE = 'public/style.css';

}