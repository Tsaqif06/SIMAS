<?php

class Logout extends Controller
{
    public function index()
    {
        Cookie::delete_jwt();
        header("Location: " . BASEURL . "/login");
        exit;
    }
}
