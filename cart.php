<?php
require_once 'PHP/utils.php';
//require_once 'PHP/cart_submit.php';
// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('location: index.php');
}

require_once 'PHP/cart_submit.php';
$total_price = Get_TotalPrice();

/* $user_id = $_SESSION['id'];
$conn = Database_Connection();
$user_products_query = "select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";
$query_UserProducts = SQL_Select($conn, "SELECT it.id, it.name, items.price from users_items ut INNER JOIN items it ON items.id=users_items.item_id WHERE users_items.user_id=?", "s", $user_id);
$rows_UserProducts = $query_UserProducts->num_rows;
if ($rows_UserProducts === 0) {
    // User doesn't have any products in their cart
    $notifications = "No items in your cart!";
} else {
    $sum_price = 0;
    while ($rows_result = $rows_UserProducts->fetch_assoc()) {
        $sum_price = $sum_price + $rows_result['price'];
    }
} */
?>

<!DOCTYPE html>
<html>

<?php require_once 'including/metadata.html'; ?>

<body>
    <div>
        <?php require_once 'including/header.html'; ?>
    </div>

    <div>
        <br><br><br>
        <div class="container">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>

                    <?php
                    /*                     $user_id = $_SESSION['id'];
                    $conn = Database_Connection();

                    $query_UserProducts = SQL_Select($conn, "SELECT items.id, items.name, items.price from users_items INNER JOIN items ON items.id=users_items.item_id WHERE users_items.user_id=?", "s", $user_id);
                    $rows_UserProducts = $query_UserProducts->num_rows;
                    if ($rows_UserProducts === 0) {
                        echo "No items in your cart.";
                    } else {
                        $sum_price = 0;
                        $item_number_counter = 1;
                        while ($rows_result = $query_UserProducts->fetch_assoc()) {
                            $sum_price = $sum_price + $rows_result['price']; */
                    ?>

                    <tr>
                        <th><?php //echo $item_number_counter 
                            ?></th>
                        <th><?php //echo $rows_result['name'] 
                            ?></th>
                        <th>$<?php //echo $rows_result['price'] 
                                ?></th>
                        <th><a href='PHP/products_remove.php?id=<?php echo $rows_result['id'] ?>'>Remove Item</a></th>
                    </tr>

                    <?php $item_number_counter = $item_number_counter + 1;
                    //}
                    ?>

                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th id="total-price">$<?php echo $total_price; ?></th>
                        <th><a href="PHP/confirm_orders.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm
                                Order</a>
                        </th>
                    </tr>
                    <?php //}
                    ?>
                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

</html>