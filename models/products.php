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

    public function updateFeatured($id, $newFeaturedStatus)
    {
        $query = $this->db->prepare("UPDATE 
            products 
        SET 
            is_featured = ? 
        WHERE 
            product_slug = ?
        ");

        return $query->execute([
            $newFeaturedStatus,
            $id
        ]);
    }

    public function getProductsByCategorySlug($id)
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

        $query->execute([$id]);

        return $query->fetchAll();
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

    public function getAll()
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
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
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

        $query->execute([$id]);

        return $query->fetch();
    }

    public function create($data)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            products 
            (product_name, 
            product_slug, 
            product_image, 
            price, 
            stock) 
        VALUES 
            (?, ?, ?, ?, ?)
        ");

        $query->execute([
            $data["product_name"],
            $data["product_slug"],
            $data["product_image"],
            $data["price"],
            $data["stock"]
        ]);

        $data["product_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function update($data, $id)
    {
        $query = $this->db->prepare("UPDATE 
            products
        SET 
            product_name = ?,
            product_slug = ?, 
            product_image = ?,
            price = ?,
            stock = ?
        WHERE 
            product_slug = ?
        ");

        $query->execute([
            $data["product_name"],
            $data["product_slug"],
            $data["product_image"],
            $data["price"],
            $data["stock"],
            $id
        ]);

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE
        FROM 
            products
        WHERE 
            product_slug = ?
        ");

        return $query->execute([$id]);
    }

    public function getProductHero($id)
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

    public function getProductDescriptions($id)
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

        $query->execute([$id]);

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

    public function getImages($directory = "images/products/thumbnail/")
    {
        $images = [];

        if (is_dir($directory)) {
            $files = scandir($directory);

            foreach ($files as $file) {

                if ($file !== "." && $file !== ".." && preg_match('/\.(jpg|jpeg)$/i', $file)) {

                    $images[] = $file;
                }
            }
        }

        return $images;
    }

    public function uploadImage($image, $directory = "images/products/thumbnail/")
    {
        $filePath = $directory . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $filePath)) {
            return true;
        }
        return false;
    }

    public function deleteImage($image, $directory = "images/products/thumbnail/")
    {
        $filePath = $directory . $image;

        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT 
            COUNT(*) 
        FROM 
            products
        ");

        $query->execute();

        return $query->fetchColumn();
    }
}
