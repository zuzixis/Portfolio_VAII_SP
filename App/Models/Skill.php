<?php
namespace App\Models;

use App\Core\Model;

class Skill extends Model
{

    public function __construct(
        public int $id = 0,
        public string $name = "",
        public string $image = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name','image'];
    }

    static public function setTableName()
    {
        return "skills";
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
}