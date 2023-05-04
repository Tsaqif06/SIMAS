<?php

class Controller
{
    protected $user;

    public function __construct() {
        $jwt = Cookie::get_jwt();

        $controller = '';
        if (!empty($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            $controller = strtolower($url[0]);
        }

        if (!in_array($controller, ['login', 'lupasandi', 'verifikasi'])) {
            if (!$jwt) {
                header("Location: " . BASEURL . "/login");
                exit;
            } else {
                $data["id"] = $jwt->sub;
                $data["username"] = $jwt->name;
                $data["role"] = $jwt->role;
                $data["hak_akses"] = $jwt->akses;
    
                $this->user = $this->model("Login", "Login_model")->authentication($data);
            }
        }
        
    }

    public function view($view, $data = [])
    {
        require_once "../app/views/{$view}.php";
    }

    public function model($file, $model)
    {
        require_once "../app/models/{$file}/{$model}.php";
        return new $model;
    }
}
