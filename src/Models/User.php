<?php

namespace Source\Main\Models;

class User extends \CoffeeCode\DataLayer\DataLayer
{
    public function __construct(
        string $entity = "usuarios",
        array $required = ['email', 'senha'],
        string $primary = 'id',
        bool $timestamps = false,
        array $database = null
    ) {
        parent::__construct($entity, $required, $primary, $timestamps, $database);
    }

    public function sign($data)
    {
        $this->create($data);
    }

    public function login(string $email, string $password)  : array
    {
        try {
            $user = $this->find("email = :email", "email=$email")->fetch();
            $userData = $user->data();
            if(password_verify($password, $userData->senha)){
                return [
                    "UserID" => $userData->id,
                    "Email"=> $userData->email,
                    "Authenticated" => "Yes"
                    ];
            }
            var_dump($user);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
        exit();
    }
}