<?php
require_once 'config/config.php';
require_once '../vendor/autoload.php';
require_once 'controllers/login/Session.php';

spl_autoload_register(function ($class) {
    require_once "../core/$class.php";
});
