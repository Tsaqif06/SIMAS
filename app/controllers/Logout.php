<?php

class Logout extends Controller
{
    public function index()
    {
        setcookie("SIMAS-SESSION", "", time() - 3600, "/");
        header("Location: " . BASEURL . "/login");
        exit;
    }
}
