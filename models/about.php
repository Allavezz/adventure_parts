<?php

require_once("base.php");

class About extends Base
{
    public function get()
    {

        $query = $this->db->prepare("
            SELECT
                about_title, about_image, about_text, image_alt
            FROM
                about
        ");

        $query->execute();

        return $query->fetch();
    }

    public function update($data)
    {
        $query = $this->db->prepare("UPDATE 
            about 
        SET 
            about_title = ?, 
            about_image = ?, 
            about_text = ?, 
            image_alt = ? 
        WHERE 
            about_id = 1
        ");

        $query->execute([
            $data["about_title"],
            $data["about_image"],
            $data["about_text"],
            $data["image_alt"]
        ]);

        return $data;
    }

    public function getImages($directory = "images/about/")
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

    public function uploadImage($image, $directory = "images/about/")
    {
        $filePath = $directory . basename($image["name"]);



        if (move_uploaded_file($image["tmp_name"], $filePath)) {
            return true;
        }
        return false;
    }

    public function deleteImage($image, $directory = "images/about/")
    {
        $filePath = $directory . $image;

        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }
}
