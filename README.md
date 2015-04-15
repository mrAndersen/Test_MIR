# Test_MIR

Тестовое задание для "МИР", написано с использованием doctrine-orm и composer для того чтобы развернуть проект необходимо:
  
  - git pull <папка с проектом>
  - php composer.phar install -d=<папка с проектом>
  - https://github.com/mrAndersen/Test_MIR/blob/master/src/Lib/Database.php в файле настроить данные своего коннекта к базе
  - <папка с проектом>\vendor\bin\doctrine orm:schema-tool:update --force для обновления схемы базы данных
  
Приведенные в задании методы содержатсья в test.php, само исполнение скрипта создаст базу и заполнит начальными данными.
