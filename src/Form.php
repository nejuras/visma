<?php

namespace Visma\Registration;


class Form
{
    private $conn;

    public function __construct(\PDO $pdo)
    {
        $this->conn = $pdo;
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['firstname'])) {
                $firstname = $_POST['firstname'];
            } else {
                echo "Firstname field is empty", PHP_EOL;
                return false;
            }
            if (!empty($_POST['lastname'])) {
                $lastname = $_POST['lastname'];
            } else {
                echo "Lastname field is empty", PHP_EOL;
                return false;
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !empty($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                echo $_POST['email'] . " is not a valid email", PHP_EOL;
                return false;
            }
            if (preg_match("/(\+370)?[0-9]{8}/", $_POST['phonenumber1']) || !empty($_POST['phonenumber1'])) {
                $phonenumber1 = $_POST['phonenumber1'];
            } else {
                echo "Phone Number 1 field is not valid", PHP_EOL;
                return false;
            }
            if (preg_match("/(\+370)?[0-9]{8}/", $_POST['phonenumber2']) || !empty($_POST['phonenumber2'])) {
                $phonenumber2 = $_POST['phonenumber2'];
            } else {
                echo "Phone Number 2 field is not valid", PHP_EOL;
                return false;
            }
            if (!empty($_POST['comment'])) {
                $comment = $_POST['comment'];
            } else {
                echo "Comment field is empty", PHP_EOL;
                return false;
            }

            $sql = "INSERT INTO registration (first_name, last_name, email, phone_number1, phone_number2, comment) 
                VALUES (:first_name, :last_name, :email, :phone_number1, :phone_number2, :comment)
                ON DUPLICATE KEY UPDATE email = :email;";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':first_name', $firstname, \PDO::PARAM_STR);
            $query->bindParam(':last_name', $lastname, \PDO::PARAM_STR);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->bindParam(':phone_number1', $phonenumber1, \PDO::PARAM_STR);
            $query->bindParam(':phone_number2', $phonenumber2, \PDO::PARAM_STR);
            $query->bindParam(':comment', $comment, \PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount()) {
                echo "Success: New values are inserted", PHP_EOL;
            } else {
                echo "This email: " . $email . " is already exist", PHP_EOL;
            }

        }
        return false;
    }

    public function update()
    {
        if (isset($_POST['update'])) {

            $sql = "UPDATE registration SET first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                phone_number1 = :phone_number1,  
                phone_number2 = :phone_number2,   
                comment = :comment  
                WHERE id = :id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $_POST['update']);
            $query->bindParam(':first_name', $_POST['firstname']);
            $query->bindParam(':last_name', $_POST['lastname']);
            $query->bindParam(':email', $_POST['email']);
            $query->bindParam(':phone_number1', $_POST['phonenumber1']);
            $query->bindParam(':phone_number2', $_POST['phonenumber2']);
            $query->bindParam(':comment', $_POST['comment']);
            $query->execute();
            if ($query->rowCount()) {
                echo "Success: Table Registration where id:" . $_POST['update'] . " is updated", PHP_EOL;
            } else {
                echo "Table Registration where id:" . $_POST['update'] . " is already updated or no such id", PHP_EOL;
            }
        }
        return false;
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {

            $sql = "DELETE FROM registration WHERE id = :id";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $_POST['delete']);
            $query->execute();
            if ($query->rowCount()) {
                echo "Success: Field where id:" . $_POST['delete'] . " is deleted", PHP_EOL;
            } else {
                echo "Field where id:" . $_POST['delete'] . " is already deleted or no such id", PHP_EOL;
            }
        }
        return false;
    }
}