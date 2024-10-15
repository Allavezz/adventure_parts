<?php

require_once("base.php");

class Products extends Base
{
    public function getFeaturedProducts()
    {
        $query = $this->db->prepare("SELECT 
                products.product_id, 
                products.product_name, 
                products.product_slug, 
                products_hero.hero_image_url 
            FROM 
                products 
            JOIN 
                products_hero ON products.product_id = products_hero.product_id 
            WHERE 
                products.is_featured = 1
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getProductsByCategorySlug($slug)
    {
        $query = $this->db->prepare("SELECT 
                p.product_id, 
                p.product_name, 
                p.product_slug, 
                p.product_image 
            FROM 
                products p 
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
        $query = $this->db->prepare("SELECT 
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
                product_slug = ?
        ");

        $query->execute([$slug]);

        return $query->fetch();
    }

    public function checkStock($item)
    {
        $query = $this->db->prepare("
                SELECT product_id, stock
                FROM products
                WHERE product_id = ?
                AND stock >= ?
            ");

        $query->execute([
            $item["product_id"],
            $item["quantity"]
        ]);

        return $query->fetch();
    }

    public function updateStock($item)
    {
        $query = $this->db->prepare("UPDATE 
            products 
        SET 
            stock = stock - ? 
        WHERE 
            product_id = ?
        ");

        return $query->execute([
            $item["quantity"],
            $item["product_id"]
        ]);
    }

    public function getProductHero($slug)
    {
        $query = $this->db->prepare("SELECT  
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

    public function getProductDescriptions($slug)
    {
        $query = $this->db->prepare("SELECT 
                p.product_id,
                pd.product_descriptions_id, 
                pd.title, 
                pd.image_url, 
                pd.image_alt 
            FROM 
                product_descriptions pd 
            JOIN 
                products p ON pd.product_id = p.product_id 
            WHERE 
                p.product_slug = ? 
            ORDER BY 
                pd.sort_order

        ");

        $query->execute([$slug]);

        return $query->fetchAll();
    }

    public function getContentByDescriptionId($descriptionId)
    {
        $query = $this->db->prepare("SELECT 
                c.content_id, 
                c.content_type, 
                c.content 
            FROM 
                descriptions_content c 
            WHERE 
                c.product_descriptions_id = ? 
            ORDER BY 
                c.sort_order
        ");

        $query->execute([$descriptionId]);

        return $query->fetchAll();
    }
}
