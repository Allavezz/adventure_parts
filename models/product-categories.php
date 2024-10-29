<?php

require_once("base.php");

class ProductsCategories extends Base
{
    public function getProductsByCategory($id)
    {
        $query = $this->db->prepare("SELECT 
                p.product_id, 
                p.product_name, 
                p.product_slug, 
                p.product_image 
            FROM 
                products p 
            lEFT JOIN 
                product_categories pc ON p.product_id = pc.product_id 
            LEFT JOIN 
                categories c ON c.category_id = pc.category_id 
            WHERE 
                c.category_slug = ?
            ORDER BY
                p.product_name ASC
        ");

        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function getProductCategories($id)
    {
        $query = $this->db->prepare("SELECT
            category_id 
        FROM 
            product_categories
        WHERE 
            product_id = ?
        ");

        $query->execute([$id]);

        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    public function addProductToCategory($productId, $categoryId)
    {
        $query = $this->db->prepare("INSERT
         INTO 
            product_categories (product_id, category_id) 
        VALUES 
            (?, ?)
        ");

        return $query->execute([
            $productId,
            $categoryId
        ]);
    }

    public function removeProductFromCategory($productId, $categoryId)
    {
        $query = $this->db->prepare("DELETE
         FROM 
            product_categories 
         WHERE 
            product_id = ? 
         AND 
            category_id = ?
        ");

        return $query->execute(
            [
                $productId,
                $categoryId
            ]
        );
    }
}
