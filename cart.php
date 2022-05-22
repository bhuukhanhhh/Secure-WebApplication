<?php
require_once 'PHP/utils.php';

// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>

<?php require_once 'including/metadata.html'; ?>

<body>
    <div>
        <?php require_once 'including/header.html'; ?>
    </div>

    <div>
        <br><br>
        <div class="container">
            <center>
                <h2>List of items that you have added to your cart</h2>
                <br>
            </center>

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>

                    <?php
                    $user_id = $_SESSION['id'];
                    $conn = Database_Connection();
                    if ($conn) {
                        $select_UserItem = SQL_Select($conn, "SELECT items.id, items.name, items.price from users_items INNER JOIN items ON items.id=users_items.item_id WHERE users_items.user_id=?", "s", $user_id);
                        $rows_number = $select_UserItem->num_rows;
                        if ($rows_number === 0) {
                            // nothing in user cart
                            echo "<div><strong><No items in your cart.</strong></div>";
                        } else {
                            $total_price = 0;
                            $item_number = 1;
                            while ($fetch_result = $select_UserItem->fetch_assoc()) {
                                $total_price = $total_price + $fetch_result['price'];
                    ?>
                    <tr>
                        <th><?php echo $item_number; ?></th>
                        <th><?php echo $fetch_result['name']; ?></th>
                        <th>$<?php echo $fetch_result['price']; ?></th>
                        <th><a href="PHP/products_remove.php?id=<?php echo $fetch_result['id']; ?>">Remove Item</a></th>
                    </tr>
                    <?php
                                $item_number = $item_number + 1;
                            }
                            ?>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>$<?php echo $total_price; ?></th>
                        <th><a href="PHP/confirm_orders.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm
                                Order</a></th>
                    </tr>
                    <?php
                        }
                    } else {
                        // [ERROR] Cannot connect to database
                        echo '<script>alert("Something wrongs happened.")</script>';
                    }
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