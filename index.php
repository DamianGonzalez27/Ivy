<?php

include_once "Core/Autoloader/Autoload.php";

$ruta_kernel = 'Core\Kernel';

$kernel = new Autoload($ruta_kernel);

$app = $kernel->ruta();

require_once $app;

use Core\Kernel;

$test = Kernel::test();

print($test);

//Core\Kernel::test();





