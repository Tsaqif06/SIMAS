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
        // try {
        //     $session = Login::getCurrentSession();
        // } catch (Exception $exception) {
        //     header('Location: ' . BASEURL . 'login');
        //     exit(0);
        // }
        return Login::getCurrentSession();
    }
}
