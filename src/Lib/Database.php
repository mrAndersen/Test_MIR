<?php

namespace Lib;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Entity\Contact;
use Entity\ContactType;
use Entity\User;
use Entity\UserType;

class Database{

    public static $config = [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => 'matrixx1s',
        'dbname'   => 'test_mir',
    ];

    public static $paths = ["src/Entity"];
    public static $isDevMod = true;
    public static $types = ['Admin','Moderator','Developer','Manager','Top-Manager','Sale'];
    public static $contactTypes = ['Sms','Email','Jabber','Mobile'];

    /**
     * Создание Entity Manager
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public static function createEm()
    {
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration(self::$paths, self::$isDevMod);
        $em = EntityManager::create(self::$config, $doctrineConfig);

        return $em;
    }

    /**
     * Проверка на инициализированность базы
     * @return bool
     */
    public static function isInitialized()
    {
        $em = self::createEm();
        //Допустим будем считать что начальные данные есть если количество типов пользователей 6
        //Немного глупо конечно, ну да ладно, в данном примере не играет особой роли :)
        return count($em->getRepository('Entity\UserType')->findAll()) == 6 ? true : false;
    }

    /**
     * Инициализация начальных данных
     * @return bool
     */
    public static function initDatabase()
    {
        if(!self::isInitialized()){
            $result = false;
            try{
                $em = self::createEm();

                //Запишем в базу начальные данные
                foreach(self::$types as $k=>$v){
                    $userType = new UserType();
                    $userType->setName($v);

                    $em->persist($userType);
                }
                foreach(self::$contactTypes as $k=>$v){
                    $contactType = new ContactType();
                    $contactType->setName($v);

                    $em->persist($contactType);
                }
                //Флашим чтобы дальше можно было работать с этими данными
                $em->flush();

                //Добавляем админа, который будет информироваться по смс
                $admin = new User();
                $admin->setAge(20);
                $admin->setName('Test');
                $admin->setNotifyType($em->getRepository('Entity\ContactType')->findOneBy(['name' => 'Sms']));
                $admin->setSex(1);
                $admin->setType($em->getRepository('Entity\UserType')->findOneBy(['name' => 'Admin']));
                $em->persist($admin);

                //Добавляем контакты админа
                $adminContact = new Contact();
                $adminContact->setContactType($em->getRepository('Entity\ContactType')->findOneBy(['name' => 'Sms']));
                $adminContact->setUser($admin);
                $adminContact->setData('+7 999 222 33 44');
                $em->persist($adminContact);

                //Флашим еще раз
                $em->flush();



                $result = true;
            } catch (\Exception $e){
                $result = false;
            }
            return $result;
        }
    }
}

