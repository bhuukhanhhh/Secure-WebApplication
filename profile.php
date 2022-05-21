<?php
require_once 'PHP/utils.php';
// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username']) || !isset($_SESSION['name'])) {
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
        <h1>Hello <?php echo $_SESSION['username']; ?></h1>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

</html>