<?php
require_once 'config/config.php';

spl_autoload_register(function ($class) {
    require_once __DIR__ . "/core/$class.php";
});
