<?php
require_once "vendor/autoload.php";
use Doctrine\ORM\Tools\Console\ConsoleRunner;


return ConsoleRunner::createHelperSet(\Lib\Database::createEm());