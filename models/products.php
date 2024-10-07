<?php

require_once("base.php");

class Products extends Base
{
    public function getFeaturedProducts()
    {
        $query = $this->db->prepare(" 
            SELECT 
                products.product_id, 
                products.product_name, 
                products.product_slug, 
                products_hero.hero_image_url 
            FROM products 
            JOIN products_hero ON products.product_id = products_hero.product_id 
            WHERE products.is_featured = 1
        ");

        $query->execute();

        return $query->fetchAll();
    }
}
