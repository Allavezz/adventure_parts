<?php

require_once("base.php");

class Contacts extends Base
{
    public function create($data)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            contacts 
            (topic,
            description,
            category,
            year,
            order_id,
            email,
            country)
        VALUES
            (?, ?, ?, ?, ?, ?, ?)
        ");

        $query->execute([
            $data["topic"],
            $data["description"],
            $data["category"],
            $data["year"],
            $data["order"],
            $data["email"],
            $data["country"]
        ]);

        $data["contact_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function getAll()
    {
        $query = $this->db->prepare("SELECT 
            contact_id, 
            topic, 
            email, 
            created_at
        FROM 
            contacts
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT 
            contact_id,
            topic, 
            description, 
            category, 
            year, 
            order_id, 
            email, 
            country, 
            created_at
        FROM
            contacts 
        WHERE 
            contact_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM 
            contacts
        WHERE 
            contact_id = ?
        ");

        return $query->execute([$id]);
    }
}
