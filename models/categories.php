<?php

require_once("base.php");

class Categories extends Base
{
    public function getAll()
    {

        $query = $this->db->prepare(" 
            SELECT 
                category_id, category_name, category_slug, category_image, sort_order 
            FROM 
                categories 
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
                categories 
            WHERE 
                category_slug= ?
        ");

        $query->execute([
            $id
        ]);

        return $query->fetch();
    }
}
