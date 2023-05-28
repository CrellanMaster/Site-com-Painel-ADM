<?php

namespace Source\Main\Facades;

use Source\Main\Models\User;

class Login
{
    private string $email;
    private string $password;

    public function __construct($email, $password)
    {
        if (isset($email) && isset($password) && $email > 0 && $password > 0) {
            $this->email = $email;
            $this->password = $password;
        } else {
            throw new \Exception ("Preencha dos dados corretamente!");
        }
    }

    public function getEmail(): string
    {
        return $email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function loginAuth(User $user)
    {
        $userData = $user->login($this->getEmail(), $this->getPassword());

        if (isset($userData['Authenticated']) && $userData['Authenticated'] === 'Yes') {
            session_start();
            $_SESSION['id'] = $userData['UserID'];
            $_SESSION['email'] = $userData['Email'];
            $_SESSION['logged-in'] = true;
        }
    }
}