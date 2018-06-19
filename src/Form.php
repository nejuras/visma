<?php

namespace Visma\Registration;


class Form
{
    private $conn;
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }

    public function insert()
    {
        $data = [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'email' => $_POST['email'],
            'phone_number1' => $_POST['phonenumber1'],
            'phone_number2' => $_POST['phonenumber2'],
            'comment' => $_POST['comment']
        ];

            $sql = "INSERT INTO registration (first_name, last_name, email, phone_number1, phone_number2, comment)
    VALUES (:first_name, :last_name, :email, :phone_number1, :phone_number2, :comment)";

            $query = $this->conn->prepare($sql);
            $query->execute($data);
            return $query;

    }
}