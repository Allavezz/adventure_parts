<?php

require_once("base.php");

class Admins extends Base
{
    public function getByEmail($email)
    {
        $query = $this->db->prepare("SELECT 
            admin_id, 
            password 
        FROM 
            admins 
        WHERE 
            email = ?
        ");

        $query->execute([$email]);

        return $query->fetch();
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT 
            admin_id,  
            name, 
            employee_number,
            email, 
            password 
        FROM 
            admins
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT
            admin_id, 
            name, 
            employee_number,
            email, 
            password 
        FROM 
            admins 
        WHERE 
            admin_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }

    public function create($data)
    {
        $query = $this->db->prepare("INSERT INTO admins 
            (name, 
            employee_number, 
            email, 
            password) 
        VALUES 
            (?, ?, ?, ?)
        ");

        $query->execute([
            $data["name"],
            $data["employee_number"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT)
        ]);

        $data["admin_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function update($data, $id)
    {
        $query = $this->db->prepare("UPDATE
            admins 
        SET 
            name = ?,
            employee_number = ?,
            email = ?, 
            password = ?
        WHERE 
            admin_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["employee_number"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT),
            $id
        ]);

        $data["admin_id"] = $id;

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM
            admins 
        WHERE 
            admin_id = ?
        ");

        return $query->execute([$id]);
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT
            COUNT(*) 
        FROM 
            admins
        ");

        $query->execute();

        return $query->fetchColumn();
    }
}
