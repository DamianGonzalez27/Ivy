<?php

require 'vendor/autoload.php';

use Core\Autoloader;

$a = new Autoload;

$b = $a->register();

print($b);





