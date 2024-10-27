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
                category_image 
            FROM 
                categories
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT 
                category_id, 
                category_name, 
                category_slug, 
                category_image  
            FROM 
                categories 
            WHERE 
                category_slug = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }


    public function create($data)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            categories 
            (category_name, 
            category_slug, 
            category_image) 
        VALUES 
            (?, ?, ?)
        ");

        $query->execute([
            $data["category_name"],
            $data["category_slug"],
            $data["category_image"]
        ]);

        $data["category_id"] = $this->db->lastInsertId();

        return $data;
    }

    public function update($data, $id)
    {
        $query = $this->db->prepare("UPDATE
            categories 
        SET 
            category_name = ?,  
            category_slug = ?, 
            category_image = ?
        WHERE 
            category_slug = ?
        ");

        $query->execute([
            $data["category_name"],
            $data["category_slug"],
            $data["category_image"],
            $id
        ]);

        return $data;
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM 
            categories 
        WHERE 
            category_slug = ?
        ");

        return $query->execute([$id]);
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT 
            COUNT(*)
        FROM 
            categories
        ");

        $query->execute();

        return $query->fetchColumn();
    }

    public function getImages($directory = "images/categories/")
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

    public function uploadImage($image, $directory = "images/categories/")
    {
        $filePath = $directory . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $filePath)) {
            return true;
        }
        return false;
    }

    public function deleteImage($image, $directory = "images/categories/")
    {
        $filePath = $directory . $image;

        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }
}
