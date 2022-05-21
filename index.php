<?php require_once 'PHP/utils.php'; ?>

<!DOCTYPE html>
<html>

<?php require_once 'including/metadata.html'; ?>

<body>
    <div>
        <?php require_once 'including/header.html'; ?>
    </div>

    <div>
        <div id="bannerImage">
            <div class="container">
                <center>
                    <div id="bannerContent">
                        <h1>We sell lifestyle with one click.</h1>
                        <a href="products.php" class="btn btn-danger">Shop Now</a>
                    </div>
                </center>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="Images/camera.jpg" alt="Camera">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Cameras</p>
                                <p>Choose among the best available in the world.</p>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="Images/watch.jpg" alt="Watch">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Watches</p>
                                <p>Original watches from the best brands.</p>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="Images/shirt.jpg" alt="Shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Shirts</p>
                                <p>Our exquisite collection of shirts.</p>
                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br><br><br><br>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

</html>