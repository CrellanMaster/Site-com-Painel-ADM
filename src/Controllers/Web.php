<?php

namespace Source\Main\Controllers;

use League\Plates\Engine;
use Source\Main\Facades\Login;
use Source\Main\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../Views", "php");
    }

    public function home()
    {
        session_start();
        var_dump($_SESSION);
        echo $this->view->render("home", [
            "Title" => "Home Page"
        ]);
    }

    public function login()
    {
        //var_dump($_SERVER);
        session_start();
        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) {
            header("location: admin");
        }

        //var_dump($_SESSION);
        echo $this->view->render('login', [
            "Title" => "Entrar"
        ]);
    }

    public function loginAct()
    {
        try {
            $login = new Login($_POST['user'], $_POST['password']);
        } catch (\Exception $e) {
            header("location: /login?login_failed=2");
        }
        $user = new User();
        $login->loginAuth($user);
        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) {
            header("location: /admin");
        } else {
            header("location: /login?login_failed=1");
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) {
            session_destroy();
            //var_dump($_SESSION);
        }
        header("location: /");
    }

    public function sign()
    {
        echo $this->view->render('sign', [
            "Title" => "Cadastrar"
        ]);
    }

    public function signAct()
    {
        //var_dump($_POST);
        if (!isset($_POST['user']) || !isset($_POST['password'])) {
            header("location : /login");
            exit;
        }

        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $data = [
            "email" => $_POST['user'],
            "senha" => $pass
        ];

        $user = new User();
        $user->sign($data);

        echo $this->view->render('sign', [
            "Title" => "Cadastrar",
            "Success" => true
        ]);
    }

    public function admin()
    {
        echo $this->view->render('admin', [
            "Title" => "admin"
        ]);
    }

    public function error($data)
    {
        echo $this->view->render('error', [
            "Title" => "Error",
            "Errcode" => $data['errcode']
        ]);
    }
}