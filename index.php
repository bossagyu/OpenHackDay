<?php
require 'AutoLoader.php';
require 'Dispatcher.php';

$autoLoader = new AutoLoader();
$autoLoader->registerDir(dirname(__FILE__). '/model');
$autoLoader->register();

$dispatcher = new Dispatcher();
$dispatcher = setSystemRoot('/home/kouhei/hackday');
$dispatcher->dispatch();


?>
