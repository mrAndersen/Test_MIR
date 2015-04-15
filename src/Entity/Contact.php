<?php
/**
 * Created by PhpStorm.
 * User: mrAndersen
 * Date: 15.04.2015
 * Time: 23:24
 */

namespace Entity;

/**
 * @Entity
 * @Table(name="contact")
 */
class Contact {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;


    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ManyToOne(targetEntity="ContactType")
     * @JoinColumn(name="contact_type", referencedColumnName="id", nullable=true)
     */
    private $contact_type;


    /**
     * @var string
     * @Column(name="data", type="string", nullable=false)
     */
    private $data;

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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contact_type;
    }

    /**
     * @param mixed $contact_type
     */
    public function setContactType($contact_type)
    {
        $this->contact_type = $contact_type;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}