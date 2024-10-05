<?php

require_once("base.php");

class Models extends Base
{
    public function getAll()
    {

        $query = $this->db->prepare(" 
            SELECT 
                model_id, model_name, model_slug, model_image, sort_order 
            FROM 
                model 
            ORDER BY 
                sort_order ASC
        ");

        $query->execute();

        return $query->fetchAll();
    }
}
