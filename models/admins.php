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

    public function create($data)
    {
        $query = $this->db->prepare("INSERT INTO admins 
            (name, 
            email, 
            password) 
        VALUES 
            (?, ?, ?)
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT)
        ]);

        $data["admin_id"] = $this->db->lastInsertId();

        return $data;
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
