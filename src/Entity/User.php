<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;


    /**
     * @var integer
     * @Column(name="age", type="integer", nullable=false, length=3)
     */
    private $age;


    /**
     * @var integer
     * @Column(name="sex", type="integer", nullable=false, length=1)
     */
    private $sex;

    /**
     * @var string
     * @Column(name="name", type="string", nullable=false, length=20)
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="UserType")
     * @JoinColumn(name="type", referencedColumnName="id", nullable=true)
     */
    private $type;

    /**
     * @ManyToOne(targetEntity="ContactType")
     * @JoinColumn(name="notify_type", referencedColumnName="id", nullable=true)
     */
    private $notify_type;

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
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNotifyType()
    {
        return $this->notify_type;
    }

    /**
     * @param mixed $notify_type
     */
    public function setNotifyType($notify_type)
    {
        $this->notify_type = $notify_type;
    }


    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'sex' => $this->sex == 1 ? 'Male' : 'Female',
            'type' => $this->type->getName(),
            'notify_type' => $this->notify_type->getName()
        ];
    }



}
