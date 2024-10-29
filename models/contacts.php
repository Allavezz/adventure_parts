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
}
