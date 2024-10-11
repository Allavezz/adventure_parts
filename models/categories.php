<?php

require_once("base.php");

class Categories extends Base
{
    public function getAll()
    {
        $query = $this->db->prepare("SELECT 
                category_id, 
                category_name, 
                category_slug, 
                category_image, 
                sort_order 
            FROM 
                categories
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($slug)
    {
        $query = $this->db->prepare("SELECT 
                category_id, 
                category_name, 
                category_slug, 
                category_image, 
                sort_order  
            FROM 
                categories 
            WHERE 
                category_slug= ?
        ");

        $query->execute([$slug]);

        return $query->fetch();
    }
}
