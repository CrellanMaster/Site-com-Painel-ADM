<?php

function AuthSession()
{
        if (!isset($_SESSION['logged-in']) && !$_SESSION['logged-in'] === true) {
            session_destroy();
            header('Location: /login'); // Redireciona para a página de login
            exit;
        }
}