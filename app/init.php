<?php
require_once 'config/config.php';
require_once dirname(__DIR__) . '\\vendor\\autoload.php';

spl_autoload_register(function ($class) {
    require_once "../core/$class.php";
});