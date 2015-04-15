<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="user_type")
 */
class UserType
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;


    /**
     * @var integer
     * @Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}
