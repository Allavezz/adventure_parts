<?php

require_once("base.php");

class Countries extends Base
{
    public function getAll()
    {
        $query = $this->db->prepare("SELECT 
            code, 
            name
        FROM
            countries
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT 
            code, 
            name 
        FROM 
            countries 
        WHERE 
            code = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }

    public function create($data)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            countries
            (code, 
            name)
        VALUES 
            (?, ?)
        ");

        $query->execute([
            $data["code"],
            $data["name"]
        ]);

        return $data;
    }

    public function update($data, $id)
    {
        $query = $this->db->prepare("UPDATE 
            countries 
        SET 
            code = ?,
            name = ? 
        WHERE 
            code = ?
        ");

        $query->execute([
            $data["code"],
            $data["name"],
            $id
        ]);

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM 
            countries 
        WHERE 
            code = ? 
        ");

        return $query->execute([$id]);
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT 
            COUNT(*) 
        FROM 
            countries
        ");

        $query->execute();

        return $query->fetchColumn();
    }
}
