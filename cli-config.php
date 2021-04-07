<?php 

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__.'/doctrine-config.php';

$entityManager = getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);