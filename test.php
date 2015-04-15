<?php
require_once "vendor/autoload.php";

//Создаем первичные данные в базе
\Lib\Database::initDatabase();

//Получаем экземпляр EntityManager
$em = \Lib\Database::createEm();

//Создаем типо контроллер :)
$actions = new \Actions\UserActions();

//Рассылаем сообщения тем у кого это предпочтительный способ связи
//$actions->sendSMSMessage();


//Сохраняем в JSON
//$actions->saveUsers();

//Уведомляем первого попавшегося пользователя
//$actions->notifyUser(reset($em->getRepository('Entity\User')->findAll()));