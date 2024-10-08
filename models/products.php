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

    public function getProductsByCategorySlug($id)
    {
        $query = $this->db->prepare(" 
            SELECT 
                p.product_id, 
                p.product_name, 
                p.product_slug, 
                p.product_image 
            FROM products p 
            JOIN 
                product_categories pc ON p.product_id = pc.product_id 
            JOIN 
                categories c ON c.category_id = pc.category_id 
            WHERE 
                c.category_slug = ?
        ");

        $query->execute([$id]);

        return $query->fetchAll();
    }
}
