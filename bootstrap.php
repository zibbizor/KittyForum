<?php
// bootstrap.php
session_start();
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'doctrine',
    'password' => 'doctrine',
    'dbname'   => 'doctrine',
    'host'     => 'localhost',
    'port'     => '3307',
);

//PHP entities
$paths = array("src/Entity");
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);
