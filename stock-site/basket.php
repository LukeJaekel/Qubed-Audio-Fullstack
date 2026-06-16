<?php 

// Connects to database
include('includes/connect.php');

// Grabs common functions
include('functions/function.php');

?>

<?php
$ip = getIPAddress();

if (isset($_POST['update-basket'], $_POST['product-id'], $_POST['qty'])) {
    $productId = (int) $_POST['product-id'];

    if (isset($_POST['qty'][$productId])) {
        $quantity = (int) $_POST['qty'][$productId];

        if ($quantity < 1) {
            $quantity = 1;
        }

        $updateQuery = "
            UPDATE cart_details
            SET quantity = $quantity
            WHERE ip_address = '$ip'
            AND product_id = $productId
        ";

        $connection->query($updateQuery);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | My Basket</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/basket.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
        <script defer src="scripts/basket.js"></script>
    </head>
    <body>

        <!-- HEADER SECTION -->
        <?php include 'includes/header.php'; ?>

        <!-- MAIN SECTION -->
        <main>
            <div class="basket-content-container">
                <section class="basket-left-container">
                    <div class="basket-title-container">
                        <h1>Equipment Cart</h1>
                        <h1><?php cartQuantity(); ?> Items</h1>
                    </div>
                    <div class="line"></div>
                    <div class="basket-headings">
                        <p class="details-heading">Product Details</p>
                        <p class="quantity-heading">Quantity</p>
                        <p class="price-heading">Price</p>
                        <p class="total-heading">Total</p>
                    </div>
                    <div class="sproduct-grid">
                        <!-- ITEMS IN CART -->
                        <?php 
                            global $connection;

                            $dailyTotal = 0;
                            $weeklyTotal = 0;
                        
                            $ip = getIPAddress();
                        
                            $cartQuery = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
                            $cartResult = $connection->query($cartQuery);
                        
                            while ($row = mysqli_fetch_array($cartResult)) {
                                $productId = $row['product_id'];
                                $currentQuantity = $row['quantity'];
                        
                                $selectQuery = "SELECT * FROM `stock` WHERE ID = '$productId'";
                                $selectResult = $connection->query($selectQuery);
                        
                                while ($productRow = mysqli_fetch_array($selectResult)) {
                        
                                    // Total price per day
                                    $dailyProductPrice = array($productRow['AssetCostPerDay']);
                                    $dailyProductValue = array_sum($dailyProductPrice);
                                    $dailyTotal += $dailyProductValue;
                        
                                    // Total price per week
                                    $weeklyProductPrice = array($productRow['AssetCostPerWeek']);
                                    $weeklyProductValue = array_sum($weeklyProductPrice);
                                    $weeklyTotal += $weeklyProductValue;

                                    $formattedDailyValue = number_format($dailyProductValue, 2);
                                    $formattedWeeklyValue = number_format($weeklyProductValue, 2);
                                    $formattedDailyTotal = number_format($dailyTotal, 2);
                                    $formattedWeeklyTotal = number_format($weeklyTotal, 2);

                                    
                                    // Product Title
                                    $productTitle = $productRow['AssetName'];

                                    // Product Image
                                    $productImage = $productRow['AssetImage'];

                                    // Product Category
                                    $categoryId = $productRow['AssetCategoryID'];
                                    $categoryQuery = "SELECT CategoryName FROM `categories` WHERE CategoryID = '$categoryId'";
                                    $categoryResult = $connection->query($categoryQuery);
                                    $categoryRow = mysqli_fetch_array($categoryResult);
                                    $productCategory = $categoryRow['CategoryName'] ?? NULL;

                        ?>  
                                <form id="product-<?php echo $productId ?>" name="product-form[]" method="post" onsubmit="updateTotals(<?php echo $productId; ?>);">
                                    <div class="sproduct">
                                        <div class="product-details">
                                            <div class="product-details-container">
                                                <div class="product-image-container">
                                                    <img class="product-image" src="<?php echo $productImage ?>" alt="product-image" onerror="this.src=`admin-area/product-images/default-image.jpeg`">
                                                </div>
                                            </div>
                                            <div class="product-details-text">
                                                <p class="product-title"><a href='product.php?ID=<?php echo $productId ?>'><?php echo $productTitle ?></a></p>
                                                <p class="product-category"><?php echo $productCategory ?></p>
                                                <input class="remove-item" type="submit" value="X Remove Item" name="remove-basket">
                                                <input type="hidden" name="product-id" value="<?php echo $productId ?>">
                                                <input class="update-basket" type="submit" value="&#8635; Update Quantity" name="update-basket">
                                            </div>
                                        </div>
                                        <div class="quantity-container">
                                        <button type="button" onclick="decreaseQuantity(<?php echo $productId ?>);">
                                                <img src="icons/minus-icon.png" alt="">
                                            </button>
                                            <input class="quantity" id="js-quantity-<?php echo $productId ?>" name="qty[<?php echo $productId; ?>]" type="text" pattern="^[a-zA-Z0-9]+$" onkeydown="return blockChars(event)" maxlength="2" required value="<?php echo isset($currentQuantity) ? $currentQuantity : 1; ?>" data-product-id="<?php echo $productId ?>" readonly>
                                            <button type="button" onclick="increaseQuantity(<?php echo $productId ?>);">
                                                <img src="icons/plus-icon.png" alt="">
                                            </button>
                                        </div>
                                        <div class="price-container">
                                            <p>P/Day: £<?php echo $formattedDailyValue ?></p>
                                            <p>P/Week: £<?php echo $formattedWeeklyValue ?></p>
                                        </div>
                                        <div class="total-container">
                                            <p id="js-daily-total-<?php echo $productId; ?>">P/Day: £<?php echo $formattedDailyTotal ?></p>
                                            <p id="js-weekly-total-<?php echo $productId; ?>">P/Week: £<?php echo $formattedWeeklyTotal ?></p>
                                        </div>
                                    </div>
                                </form>
                        <!-- Closes while loop -->
                        <?php }} ?>

                    </div>
                </section>
                <section class="basket-right-container">
                    <div class="basket-title-container">
                        <h1>Order Summary</h1>
                    </div>
                    <div class="line"></div>
                    <div class="item-amount-container">
                        <p><?php cartQuantity(); ?> Items</p>
                    </div>
                    <?php loadProductItems(); ?>
                    <div class="line"></div>
                    <div class="summary-total-container">
                        <p class="left-aligned-text">TOTAL:</p>
                        <?php
                            totalCartPrice();
                        ?>
                    </div>
                    <form class="right-form-content" method="post">
                        <div class="basket-title-container">
                            <h1 style="text-align: center; width: 100%;">Details</h1>
                        </div>
                        <div class="line"></div>
                        <div class="contact-number-container">
                            <p>Best Contact Number *</p>
                            <div class="contact-input">
                                <select name="select-phone" id="select-phone" required>
                                    <option value="1">Use number stored on account</option>
                                    <option value="2">Use a different number</option>
                                </select>
                                <input type="tel" name="phone" id="phone" placeholder="Phone Number *" required>
                            </div>
                            <p>Best Drop Off Location *</p>
                            <div class="contact-input">
                                <select name="select-address" id="select-address" required>
                                    <option value="1">Use address stored on account</option>
                                    <option value="2">Use a different address</option>
                                </select>
                                <input type="text" name="house-number" id="house-number" placeholder="House/Flat Number *" required>
                                <input type="text" name="address" id="address" placeholder="Street Address *" required>
                                <input type="text" name="city" id="city" placeholder="Town/City *" required>
                                <input type="text" name="county" id="county" placeholder="County/Region *" required>
                                <input type="text" name="post-code" id="post-code" placeholder="Post Code *" required>
                            </div>
                        </div>
                        <div class="hire-length-container">
                            <p>Hire Date (from) *</p>
                            <p>Hire Date (to) *</p>
                            <input type="date" class="calendar" required>
                            <input type="date" class="calendar" required>
                        </div>
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree to <a href="../main-site/terms-and-conditions.html" target="_blank">Terms and Conditions *</a></label>
                        </div>
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree that the information provided is correct *</a></label>
                        </div>
                        <div class="button-container">
                            <button type="submit" class="submit-button"><a>Submit Request</a></button>
                        </div>
                    </form>
                </section>
            </div>
        </main>

        <!-- Remove item from basket -->
        <?php
            removeItem();
        ?>

        <!-- FOOTER SECTION -->
        <?php include 'includes/footer.php'; ?>

        <?php
            // Fetches logic for cart
            cart();
        ?>

        <script>
            let inputElement = document.getElementById("js-quantity-" + productId);
  
            inputElement.addEventListener("blur", function(event) {
                if (event.target.value.length === 0) {
                event.target.value = "1";
                }
            });
            

            function increaseQuantity(productId) {
            let element = document.getElementById('js-quantity-' + productId);
            let quantity = parseInt(element.value);

            if (!isNaN(quantity)) {
                if (quantity > 98) {
                return;
                } else {
                element.value = quantity + 1;
                }
            }
            }

            function decreaseQuantity(productId) {
            let element = document.getElementById('js-quantity-' + productId);
            let quantity = parseInt(element.value);

            if (!isNaN(quantity)) {
                if (quantity < 2) {
                return;
                } else {
                element.value = quantity - 1;
                }
            }
            }

        </script>
    </body>
</html>