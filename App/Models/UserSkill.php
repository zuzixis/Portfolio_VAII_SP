<?php
namespace App\Models;
use App\Core\Model;

class UserSkill extends Model
{

    public function __construct(
        public int $user_id = 0,
        public int $skill_id = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['user_id', 'skill_id'];
    }

    static public function setTableName()
    {
        return "user_skills";
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
     * @return int
     */
    public function getSkillId(): int
    {
        return $this->skill_id;
    }

    /**
     * @param int $skill_id
     */
    public function setSkillId(int $skill_id): void
    {
        $this->skill_id = $skill_id;
    }
}