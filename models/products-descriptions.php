<?php

require_once("base.php");

class ProductDescriptions extends Base
{
    public function getByProductId($id)
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

    public function get($id)
    {
        $query = $this->db->prepare("SELECT
            pd.product_descriptions_id,
            pd.product_id, 
            pd.image_url,
            p.product_slug
        FROM 
            product_descriptions pd 
        INNER JOIN
            products p ON pd.product_id = p.product_id
        WHERE 
            pd.product_descriptions_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }

    public function create($data, $imageName, $id)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            product_descriptions 
            (product_id, 
            title, 
            image_url, 
            image_alt, 
            sort_order)
        SELECT 
            product_id, ?, ?, ?, ?
        FROM 
            products 
        WHERE 
            product_slug = ?
        ");

        $query->execute([
            $data["new_title"],
            $imageName,
            $data["new_alt"],
            $data["new_sort"],
            $id
        ]);

        $data["product_descriptions_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM
            product_descriptions 
        WHERE 
            product_descriptions_id = ?
        ");

        return $query->execute([$id]);
    }

    public function uploadImage($image, $directory = "images/products/description/")
    {
        $filePath = $directory . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $filePath)) {
            return true;
        }
        return false;
    }

    public function deleteImage($image, $directory = "images/products/description/")
    {
        $filePath = $directory . $image;

        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }
}
