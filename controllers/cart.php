<?php

require("models/products.php");

$model = new Products();

if (isset($_GET["add-to-cart"])) {

    $cartSlug = ($_GET["add-to-cart"]);

    $quantity = 1;

    if (preg_match('/^[a-zA-Z0-9\-]+$/', $cartSlug)) {

        $product = $model->get($cartSlug);
        $productId = $product["product_id"];

        if (!empty($product) && $product["stock"] > 0) {

            $subtractStock = $model->subtractStock($quantity, $productId);

            if (isset($_SESSION["cart"][$product["product_id"]])) {

                $_SESSION["cart"][$product["product_id"]]["quantity"] += 1;
            } else {

                $_SESSION["cart"][$product["product_id"]] = [
                    "product_id" => $product["product_id"],
                    "product_slug" => $product["product_slug"],
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

    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!validate_csrf_token($csrf_token)) {
        die("CSRF validation failed");
    }

    foreach ($_SESSION["cart"] as $item) {

        $productId = $item["product_id"];
        $quantity = $item["quantity"];

        $model->sumStock($productId, $quantity);
    }

    unset($_SESSION["cart"]);
    header("Location: " . ROOT . "/cart/");
    exit();
}


require("views/cart.php");
