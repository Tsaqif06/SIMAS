<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // controller
        $url = $this->getParseURL();
        $folder = "";
        if ($url == NULL) {
            $url = [$this->controller];
        }
        if (file_exists("../app/controllers/$url[0].php")) {
            $folder = "";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/master/$url[0].php")) {
            $folder = "master/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/tu/$url[0].php")) {
            $folder = "tu/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/kesiswaan/$url[0].php")) {
            $folder = "kesiswaan/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/humas/$url[0].php")) {
            $folder = "humas/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/kurikulum/$url[0].php")) {
            $folder = "kurikulum/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/psdm/$url[0].php")) {
            $folder = "psdm/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/sarpras/$url[0].php")) {
            $folder = "sarpras/";
            $this->controller = $url[0];
            unset($url[0]);
        } else if (file_exists("../app/controllers/login/$url[0].php")) {
            $folder = "login/";
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            $this->controller = 'Notfound';
            unset($url[0]);
        }

        require_once "../app/controllers/{$folder}{$this->controller}.php";
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller dan method, serta mengirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getParseURL() // mengubah url ke array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}