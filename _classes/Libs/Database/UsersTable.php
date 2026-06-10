<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($data)
    {
        try {
            $query = "INSERT INTO  users(name, email, phone, address, password, role_id, created_at) VALUES (:name, :email, :phone, :address, :password, :role_id, Now()
            ) ";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function findByEmailAndPassword($email, $password)
    {
        $query = "SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.email=:email AND users.password=:password";

        $statement = $this->db->prepare($query);
        $statement->execute([
            "email" => $email,
            "password" => $password
        ]);
        $row = $statement->fetch();
        return $row ?? false;
    }

    public function updatePhoto($id, $name)
    {

        $query = " UPDATE  users SET photo=:name WHERE id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute([
            'name' => $name,
            'id' => $id
        ]);
        return $statement->rowCount();
    }


    public function getAll()
    {

        $statement = $this->db->query("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id");

        return $statement->fetchAll();
    }

    public function updateSuspension($id, $status)
    {
        $statement = $this->db->prepare("UPDATE users SET suspended=:status where id = :id");
        $statement->execute([
            "id" => $id,
            "status" => $status
        ]);
        return $statement->rowCount();
    }

    public function delete($id)
    {
        $statement = $this->db->prepare("DELETE FROM users WHERE id=:id");
        $statement->execute([
            "id" => $id
        ]);
        return $statement->rowCount();
    }

    public function changeRole($id, $role)
    {

        $statement = $this->db->prepare("UPDATE users SET role_id=:role WHERE id=:id");
        $statement->execute([
            "id" => $id,
            "role" => $role
        ]);

        return $statement->rowCount();
    }
}
