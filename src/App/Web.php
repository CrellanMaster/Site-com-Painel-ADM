<?php

namespace Source\Main\App;

use League\Plates\Engine;
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
        if (!isset($_POST['user']) && !isset($_POST['password'])) {
            header("location: /login");
            exit();
        }
        $email = filter_var($_POST['user'],FILTER_VALIDATE_EMAIL);
        //var_dump(password_verify($));
        $user = new User();
        $userData = $user->login($email, $_POST['password']);
        if (isset($userData['Authenticated']) && $userData['Authenticated'] === 'Yes') {
            session_start();
            $_SESSION['id'] = $userData['UserID'];
            $_SESSION['email'] = $userData['Email'];
            $_SESSION['logged-in'] = true;

            //var_dump($_SESSION);
            header("location: /admin");
        } else {
            header("location: /login?login_failed=1");
        }
        //var_dump($userData);
        //
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