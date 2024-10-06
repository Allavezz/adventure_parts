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
                models 
            ORDER BY 
                sort_order ASC
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getBySlug($id)
    {
        $query = $this->db->prepare(" 
            SELECT 
                * 
            FROM 
                models 
            WHERE 
                model_slug= ?
        ");

        $query->execute([
            $id
        ]);

        return $query->fetch();
    }
}
