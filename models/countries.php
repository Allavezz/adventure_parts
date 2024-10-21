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
