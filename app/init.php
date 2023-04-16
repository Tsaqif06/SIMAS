<?php
$parent = dirname(__DIR__);
require_once 'config/config.php';
require_once $parent . '\\vendor\\autoload.php';

spl_autoload_register(function ($class) {
    require_once "../core/$class.php";
});
