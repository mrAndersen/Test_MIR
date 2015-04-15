<?php
/**
 * Created by PhpStorm.
 * User: mrAndersen
 * Date: 15.04.2015
 * Time: 23:10
 */

namespace Entity;


/**
 * @Entity
 * @Table(name="contact_type")
 */
class ContactType {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;


    /**
     * @var string
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}