<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>
        <section class="support-hero sc-padding-b" style="background-image: url(/images/about/HP-rotace2-min.jpg)">
            <div class="support-hero__title">
                <h2>Something went wrong? We are all ears!</h2>
            </div>
        </section>
        <section class="support-form sc-padding-b">
            <div class="support-form__container">
                <?php
                if (isset($message)) {
                    echo '<p role="alert">' . $message . '</p>';
                }
                ?>
                <div class="support-form__wrapper">

                    <h3>Adventure/Parts Support</h3>
                    <h4>We send out deliveries next working day after the order is paid.</h4>
                    <span class="support-form__heading-span">Please apply your query through the form below or drop us an email at <a href="mailto:ap@adventureparts.com">ap@adventureparts.com</a></span>

                    <form class="support-form__form" action="<?= ROOT ?>/contact/" method="POST">
                        <div>
                            <label for="support_topic">Topic <span>*</span></label>
                            <select name="topic" id="support_topic" required>
                                <option value="shipping">Where is my parcel</option>
                                <option value="pre-sale_query">Pre-sale query</option>
                                <option value="missing">I'm missing some component</option>
                                <option value="mounting">I have trouble withmounting</option>
                                <option value="compatibility">compatibility</option>
                                <option value="product_availability">Product availability</option>
                                <option value="product_defect">Product defect</option>
                                <option value="payment_issues">Payment issues</option>
                                <option value="dealers">Dealers</option>
                                <option value="spare_parts">Spare parts</option>
                                <option value="claim">Claim</option>
                                <option value="refund">Refund</option>
                                <option value="other">Other</option>
                            </select>
                            <span>Please select the reson for your contact</span>
                        </div>
                        <div>
                            <label for="support_description">Please describe your problem <span>*</span></label>
                            <textarea name="description" id="support_description" rows="10" cols="50" minlength="10" maxlength="65535"></textarea>
                        </div>
                        <div>
                            <label for="support_model">Motorcycle Category (dropdown)</label>
                            <select name="category" id="support_model">
                                <option value="" selected></option>
                                <?php
                                foreach ($categories as $category) {
                                    echo '
                                    <option value="' . $category["category_name"] . '">' . $category["category_name"] . '</option>
                                    ';
                                }
                                ?>
                            </select>
                            <span>Select yout motorcycle category</span>
                        </div>
                        <div>
                            <label for="support_year">Motorbike production year</label>
                            <input type="text" name="year" id="support_year" minlength="4" maxlength="4" />
                            <span>Enter production year of your motorcycle</span>
                        </div>
                        <div>
                            <label for="support_order_id">Order ID</label>
                            <input type="text" name="order" minlength="1" maxlength="20" placeholder="Please enter your order ID" />
                            <span>Enter your Order ID if your problem is related to a specific order</span>
                        </div>
                        <div>
                            <label for="support_email">Email <span>*</span></label>
                            <input type="email" name="email" id="support_email" required />
                            <span>Enter your email to which you want to be contacted</span>
                        </div>
                        <div>
                            <label for="support_country">Country</label>
                            <select name="country" id="support_country">
                                <option value="" selected></option>
                                <?php
                                foreach ($countries as $country) {
                                    echo '
                                    <option value="' . $country["name"] . '">' . $country["name"] . '</option>
                                    ';
                                }
                                ?>
                            </select>
                            <span>Please select the country for calculating the possible shipping or to identify version of the motorcycle</span>
                        </div>

                        <button type="submit" class="btn support-form__submit" name="send">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>