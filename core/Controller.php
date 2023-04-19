<?php
class Controller
{
    public function view($view, $data = [])
    {
        require_once "../app/views/{$view}.php";
    }

    public function model($file, $model)
    {
        require_once "../app/models/{$file}/{$model}.php";
        return new $model;
    }

    public function checkSession()
    {
        require_once dirname(__DIR__) . '\\app\\controllers\\login\\Login.php';
        return Login::getCurrentSession();
    }
}
