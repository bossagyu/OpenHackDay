<?php

require 'AutoLoader.php';
require 'Dispatcher.php';

$APIKEY = "30384f3271356159544e514a7a433135504d42386a6c7237516b773777657a534e706a6c7061756e596536";

$autoLoader = new AutoLoader();
$autoLoader->registerDir(dirname(__FILE__). '/model');
$autoLoader->registerDir(dirname(__FILE__). '/controller');
$autoLoader->register();

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('/home/kouhei/hackday');
$dispatcher->dispatch();

?>
