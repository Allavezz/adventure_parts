<?php
require("models/products.php");
$model = new Products();

header("Content-Type: application/json");

if (isset($_POST["request"])) {
    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!validate_csrf_token($csrf_token)) {
        echo json_encode(["message" => "CSRF token validation failed."]);
        exit();
    }

    if (
        $_POST["request"] === "removeProduct" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"]) &&
        !empty($_POST["quantity"]) &&
        is_numeric($_POST["quantity"])
    ) {

        $productId = intval($_POST["product_id"]);
        $quantity = intval($_POST["quantity"]);

        $model->sumStock($productId, $quantity);

        unset($_SESSION["cart"][$productId]);

        echo json_encode(["message" => "OK"]);
    } elseif (
        $_POST["request"] === "changeQuantity" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"]) &&
        !empty($_POST["quantity"]) &&
        is_numeric($_POST["quantity"]) &&
        intval($_POST["quantity"]) > 0 &&
        !empty($_SESSION["cart"])
    ) {

        $productId = intval($_POST["product_id"]);
        $newQuantity = intval($_POST["quantity"]);

        $product = $model->checkStock($_POST);

        if ($product) {
            // Get the current quantity in the cart
            $currentQuantity = $_SESSION["cart"][$product["product_id"]]["quantity"];
            $difference = $newQuantity - $currentQuantity;

            // Update stock based on the difference
            if ($difference > 0) {
                // If increasing quantity
                $model->subtractStock($difference, $productId);
            } elseif ($difference < 0) {
                // If decreasing quantity
                $model->sumStock($productId, abs($difference));
            }

            // Update the quantity in the cart
            $_SESSION["cart"][$product["product_id"]]["quantity"] = $newQuantity;

            echo json_encode(["message" => "OK"]);
        }
    }
}
