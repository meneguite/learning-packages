<?php

require 'vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use \Monolog\Handler\FirePHPHandler;
use \Monolog\Handler\RotatingFileHandler;

// Create Logger
$logger = new Logger('default');


// Add Handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/log_file.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());


// Use Logger
$logger->addInfo('My logger is now ready');
$logger->addInfo('My logger is now ready', ['add_extra_informations' => 'new informations']);

// Create new Chanel Logger
$securityLogger = $logger->withName('security');
$securityLogger->addInfo('Security log save');



// Create Logger
$rotatingLogger = new Logger('rotating');
// Add Handlers
$rotatingLogger->pushHandler(new RotatingFileHandler(__DIR__.'/log_file.log', Logger::DEBUG));

// Use Logger
$rotatingLogger->addInfo('My logger is now ready');
$rotatingLogger->addInfo('My logger is now ready', ['add_extra_informations' => 'new informations']);
