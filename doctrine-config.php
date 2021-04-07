<?php 

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Generar el gestor de entidades
 * 
 */
function getEntityManager()
{
    $dbParams = array(
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'ivy',
        'user' => 'root',
        'password' => 'damian',
        'driver' => 'pdo_mysql'
    );

    $config = Setup::createAnnotationMetadataConfiguration(
        array('./App/Database/Models/'),
        $_ENV['DEBUG'],
        ini_get('sys_temp_dir'),
        null, 
        false
    );
    $config->setAutoGenerateProxyClasses(true);

    return EntityManager::create($dbParams, $config);
}