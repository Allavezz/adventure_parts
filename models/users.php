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

    public function getAll()
    {
        $query = $this->db->prepare("SELECT 
            user_id, 
            name, 
            email 
        FROM 
            users
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT 
            user_id, 
            name, 
            email, 
            password, 
            street_address, 
            city, 
            postal_code, 
            country, 
            phone 
        FROM 
            users 
        WHERE 
            user_id = ?
        ");

        $query->execute([$id]);

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

    public function update($data, $id)
    {
        $query = $this->db->prepare("UPDATE 
            users 
        SET 
            name = ?,
            email = ?, 
            password = ?,
            street_address = ?,
            city = ?,
            postal_code = ?,
            country = ?,
            phone = ? 
        WHERE 
            user_id = ?
        ");

        $query->execute([
            $data["name"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT),
            $data["street_address"],
            $data["city"],
            $data["postal_code"],
            $data["country"],
            $data["phone"],
            $id
        ]);

        $data["user_id"] = $id;

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM 
            users 
        WHERE 
            user_id = ?
        ");

        return $query->execute([$id]);
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT 
            COUNT(*) 
        FROM 
            users
        ");

        $query->execute();

        return $query->fetchColumn();
    }
}
