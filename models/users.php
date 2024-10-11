<?php

require_once("base.php");

class Users extends Base
{
    public function getByEmail($email)
    {
        $query = $this->db->prepare("SELECT 
                user_id, 
                password 
            FROM 
                users 
            WHERE 
                email = ?
        ");

        $query->execute([$email]);

        return $query->fetch();
    }

    public function create($data)
    {
        $query = $this->db->prepare("INSERT INTO users 
                (name, 
                email, 
                password, 
                street_address, 
                city, 
                postal_code, 
                country, 
                phone) 
            VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT),
            $data["street_address"],
            $data["city"],
            $data["postal_code"],
            $data["country"],
            $data["phone"]
        ]);

        $data["user_id"] = $this->db->lastInsertId();

        return $data;
    }
}
