// init.php
<?php

require __DIR__.'/vendor/autoload.php';

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

$adapter = new Local(__DIR__.'/myfiles');
$filesystem = new Filesystem($adapter);

// Example usage
$filesystem->write('example.txt', 'Hello, world!');
