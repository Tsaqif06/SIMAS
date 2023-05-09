<?php

class Logout extends Controller
{
    public function index()
    {
        if ($this->model("Login", "Login_model")->logout(Cookie::get_jwt()->sub) > 0) {
            Cookie::delete_jwt();
            Flasher::setFlash('BERHASIL', 'Logout', 'danger');
            header("Location: " . BASEURL . "/login");
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'Logout, Coba lagi nanti!', 'danger');
            header("Location: " . BASEURL);
            exit;
        }
    }
}
