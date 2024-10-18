<?php

if (isset($_GET["add-to-cart"])) {

    $cartSlug = ($_GET["add-to-cart"]);

    if (preg_match('/^[a-zA-Z0-9\-]+$/', $cartSlug)) {

        require("models/products.php");

        $model = new Products();
        $product = $model->getBySlug($_GET['add-to-cart']);

        if (!empty($product) && $product["stock"] > 0) {

            if (isset($_SESSION["cart"][$product["product_id"]])) {

                $_SESSION["cart"][$product["product_id"]]["quantity"] += 1;
            } else {

                $_SESSION["cart"][$product["product_id"]] = [
                    "product_id" => $product["product_id"],
                    "quantity" => 1,
                    "name" => $product["product_name"],
                    "price" => $product["price"],
                    "stock" => $product["stock"]
                ];
            }
        }

        header("Location: " . ROOT . "/cart/");
        exit();
    }
}


if (isset($_POST["clear_cart"])) {
    unset($_SESSION["cart"]);
    header("Location: " . ROOT . "/cart/");
    exit();
}


require("views/cart.php");
