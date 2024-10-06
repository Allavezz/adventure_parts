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
}
