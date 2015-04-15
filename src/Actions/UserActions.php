<?php

namespace Actions;

use Entity\User;

class UserActions {

    function __construct()
    {
        $this->em = \Lib\Database::createEm();
    }

    public function sendSMSMessage()
    {
        //Посылаем смски тем у кого это предпочтительный способ оповещения
        $smsType = $this->em->getRepository('Entity\ContactType')->findOneBy(['name' => 'Sms']);

        $selectedUsers = $this->em->getRepository('Entity\User')->findBy([
            'notify_type' => $smsType
        ]);

        foreach($selectedUsers as $k=>$v){
            //Что-то делаем, шлем смс
            $sent[] = $v->getId();
        }

        return $sent;
    }

    public function saveUsers()
    {
        $users = $this->em->getRepository('Entity\User')->findAll();
        foreach($users as $k=>$v){
            $jsonresult[] = $v->toArray();
        }

        return file_put_contents('users.json',json_encode($jsonresult));
    }

    /**
     * @param $user User
     */
    public function notifyUser($user)
    {
        $notifyType = $user->getNotifyType();

        if($notifyType->getName() == 'Sms'){
            //Шлем смс
        }elseif($notifyType->getName() == 'Email'){
            //Шлем мыло
        }
        //и так далее



    }









}