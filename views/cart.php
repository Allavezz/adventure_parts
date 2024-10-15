<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const removeButtons = document.querySelectorAll('button[name="remove"]');
            const changeInputs = document.querySelectorAll('input[name="changeQuantity"]');
            const totalDisplay = document.querySelector("tr.cart__tr-buttons td:last-child"); // Total price cell

            // Function to recalculate and update the cart total
            function updateCartTotal() {
                let total = 0;
                const cartRows = document.querySelectorAll("tr[data-product_id]");

                cartRows.forEach(row => {
                    const priceElement = row.querySelector("td:nth-child(2)"); // Price
                    const quantityElement = row.querySelector('input[name="changeQuantity"]'); // Quantity
                    const subtotalElement = row.querySelector("td:nth-child(4)"); // Subtotal

                    const price = parseFloat(priceElement.textContent.replace('€', ''));
                    const quantity = parseInt(quantityElement.value);
                    const subtotal = price * quantity;

                    // Update the subtotal in the table
                    subtotalElement.textContent = `€${subtotal.toFixed(2)}`;

                    // Add subtotal to the total
                    total += subtotal;
                });

                // Update the total price in the DOM
                totalDisplay.textContent = `€${total.toFixed(2)}`;
            }

            // Handle quantity changes
            for (let input of changeInputs) {
                input.addEventListener("change", () => {
                    const tr = input.closest('tr'); // Get the row of the current input
                    const product_id = tr.dataset.product_id; // Get the product ID from the data attribute
                    const quantity = input.value; // Get the new quantity

                    fetch("<?= ROOT ?>/requests/", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: `request=changeQuantity&quantity=${quantity}&product_id=${product_id}`
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.message === "OK") {
                                // Successfully updated the quantity, recalculate the totals
                                updateCartTotal();
                            } else {
                                alert("Error updating cart. Please try again.");
                            }
                        })
                        .catch(error => alert("Unexpected error occurred. Please try again."));
                });
            }

            // Handle remove buttons
            for (let button of removeButtons) {
                button.addEventListener("click", () => {
                    const tr = button.closest("tr"); // Get the row of the current button
                    const product_id = tr.dataset.product_id; // Get the product ID from the data attribute

                    fetch("<?= ROOT ?>/requests/", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: `request=removeProduct&product_id=${product_id}`
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.message === "OK") {
                                // Successfully removed the product, remove the row and update totals
                                tr.remove();
                                updateCartTotal();
                            } else {
                                alert("Error removing product. Please try again.");
                            }
                        })
                        .catch(error => alert("Unexpected error occurred. Please try again."));
                });
            }

            // Initial calculation to show correct totals when page loads
            updateCartTotal();
        });
    </script>
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>
        <?php
        if (empty($_SESSION["cart"])) {
            echo '
                <section class="sc-padding-b empty">
                    <p>Your cart is currently empty.</p>
                    <a href="' . ROOT . '/categories/all" class="btn">Return To Shop</a>
                </section>
            ';
        } else {
        ?>
            <section class="sc-padding-b cart">
                <div class="cart__container">
                    <form action="<?= ROOT ?>/cart/" method="POST">
                        <table>
                            <thead class="cart__thead">
                                <tr class="cart__tr-head">
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($_SESSION["cart"] as $item) {
                                    $subtotal = $item["price"] * $item["quantity"];
                                    $total += $subtotal;

                                    echo '
                                        <tr class="cart__tr-item" data-product_id="' . $item["product_id"] . '">
                                            <td>' . $item["name"] . '</td>
                                            <td>€' . $item["price"] . '</td>
                                            <td>
                                                <label>
                                                    <input
                                                    type="number" 
                                                    name="changeQuantity"  
                                                    value="' . $item["quantity"] . '" 
                                                    min="1" 
                                                    max="' . $item["stock"] . '" 
                                                    aria-label="Change Quantity"
                                                    />
                                                </label>
                                            </td>
                                            <td>€' . number_format($subtotal, 2) . '</td>
                                            <td>
                                                <button type="button" name="remove" aria-label="Remove Product">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    ';
                                }
                                ?>
                                <tr class="cart__tr-buttons">
                                    <td colspan="3">
                                        <span>
                                            <input type="submit" name="clear_cart" value="Clear Cart" />
                                        </span>

                                        <span>
                                            <a href="<?= ROOT ?>/categories/all">Continue Shopping</a>
                                        </span>
                                    </td>
                                    <td colspan="2">€<?= number_format($total, 2) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <a href="<?= ROOT ?>/checkout/" class="btn cart__checkout">Proceed to checkout</a>
                </div>
            </section>
        <?php
        }
        ?>
    </main>
    <?php

    ?>

    <?php require("templates/footer.php"); ?>
</body>

</html>