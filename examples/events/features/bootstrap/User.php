<?php

/**
 * Created by PhpStorm.
 * User: aming
 * Date: 2016/10/16
 * Time: 下午4:28
 */
class User
{
    private $name;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}