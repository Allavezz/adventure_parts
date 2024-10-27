<?php

require_once("base.php");


class DescriptionsContent extends Base
{
    public function get($descriptionId)
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

    public function create($data)
    {
        $query = $this->db->prepare("INSERT 
        INTO 
            descriptions_content 
            (product_descriptions_id, 
            content_type, 
            content, 
            sort_order)
        VALUES 
            (?, ?, ?, ?)
        ");

        $query->execute([
            $data["product_descriptions_id"],
            $data["content_type"],
            $data["content"],
            $data["sort_order"]
        ]);

        $data["content_id"] = $this->db->lastInsertId();

        return $data;
    }
}
