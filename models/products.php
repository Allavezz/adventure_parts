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

    public function getProductsByCategorySlug($slug)
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

        $query->execute([$slug]);

        return $query->fetchAll();
    }

    public function getBySlug($slug)
    {
        $query = $this->db->prepare("
            SELECT 
                product_id, 
                product_name, 
                product_slug, 
                product_image, 
                price, 
                stock, 
                is_featured 
            FROM 
                products 
            WHERE 
                product_slug= ?
        ");

        $query->execute([$slug]);

        return $query->fetch();
    }

    public function getProductHero($slug)
    {
        $query = $this->db->prepare(" 
            SELECT  
                products_hero.hero_image_url 
            FROM 
                products 
            JOIN 
                products_hero ON products.product_id = products_hero.product_id 
            WHERE 
            products.product_slug = ?
        ");

        $query->execute([$slug]);

        return $query->fetch();
    }

    public function getDescriptionsWithContent($slug)
    {
        $product = $this->getBySlug($slug);

        if (!$product) {
            return [];
        }

        $productId = $product["product_id"];

        $query = $this->db->prepare("
            SELECT 
                pd.product_descriptions_id, 
                pd.title, 
                pd.image_url, 
                pd.image_alt, 
                pd.sort_order, 
                dc.content_id, 
                dc.content_type, 
                dc. content, 
                dc.sort_order 
            FROM 
                product_descriptions pd 
            LEFT JOIN 
                descriptions_content dc ON pd.product_descriptions_id = dc.product_descriptions_id 
            WHERE 
                pd.product_id = ? 
            ORDER BY 
                pd.sort_order, dc.sort_order
        ");

        $query->execute([$productId]);

        return $query->fetchAll();
    }
}
