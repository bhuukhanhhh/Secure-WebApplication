<?php
require_once 'PHP/utils.php';
require_once 'PHP/logout_submit.php';
?>

<!DOCTYPE html>
<html>

<?php require_once 'including/metadata.html'; ?>

<body>
    <div>
        <?php require_once 'including/header.html'; ?>
    </div>

    <div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <?php if (!isset($_SESSION['username'])) { ?>
                            <p>You have been logged out. <a href="login.php">Login again.</a></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

<!-- Redirect to login.php page after 3 seconds -->
<meta http-equiv="refresh" content="2;URL=login.php">

</html>