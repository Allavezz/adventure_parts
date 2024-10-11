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
}
