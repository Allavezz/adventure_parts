<?php

require_once("base.php");

class ProductsHero extends Base
{
    public function get($id)
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

        $query->execute([$id]);

        return $query->fetch();
    }

    public function create($id, $imageName)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            products_hero
            (product_id, 
            hero_image_url)
        SELECT
            product_id, ?
        FROM 
            products 
        WHERE 
            product_slug = ? 
        ");

        $query->execute([
            $imageName,
            $id
        ]);

        $data["product_hero_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function update($id, $currentImage)
    {
        $query = $this->db->prepare("UPDATE 
            products_hero ph
        JOIN
            products p ON p.product_id = ph.product_id 
        SET 
            ph.hero_image_url = ? 
        WHERE 
            p.product_slug = ?
        ");

        $query->execute([
            $currentImage,
            $id
        ]);

        return $currentImage;
    }

    public function uploadImage($image, $directory = "images/products/hero/")
    {
        $filePath = $directory . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $filePath)) {
            return true;
        }
        return false;
    }

    public function deleteImage($image, $directory = "images/products/hero/")
    {
        $filePath = $directory . $image;

        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }
}
