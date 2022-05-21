<?php
require_once 'PHP/utils.php';
/* if (!isset($_SESSION['username'])) {
    header('location: login.php');
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
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to our Nhom14 Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one
                    place.</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="PHP/products_add.php" id="1">
                            <img src="Images/cannon_eos.jpg" alt="Cannon">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Cannon EOS</h3>
                                <p>Price: $36,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/sony_dslr.jpeg" alt="Sony DSLR">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Sony DSLR</h3>
                                <p>Price: $40,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/sony_dslr2.jpeg" alt="Sony DSLR">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Sony DSLR</h3>
                                <p>Price: $50,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/olympus.jpg" alt="Olympus">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Olympus DSLR</h3>
                                <p>Price: $80,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/titan301.jpg" alt="Titan 301">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Titan Model #301</h3>
                                <p>Price: $13,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/titan201.jpg" alt="Titan 201">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Titan Model #201</h3>
                                <p>Price: $3,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/hmt.JPG" alt="htm milan">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>HMT Milan</h3>
                                <p>Price: $8,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/favreleuba.jpg" alt="Favre Leuba">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Favre Leuba #111</h3>
                                <p>Price: $18,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/raymond.jpg" alt="Raymond shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Raymond</h3>
                                <p>Price: $1,500.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/charles.jpg" alt="Charles shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>Charles</h3>
                                <p>Price: $1,000.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/HXR.jpg" alt="HXR">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>HXR</h3>
                                <p>Price: $900.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="Images/pink.jpg" alt="PINK">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>PINK</h3>
                                <p>Price: $1,200.00</p>

                                <?php if (!isset($_SESSION['username'])) { ?>
                                <p><a href="PHP/products_add.php" role="button" class="btn btn-primary btn-block">See
                                        More</a></p>
                                <?php } else { ?>
                                <p><a href="PHP/products_add.php" class="btn btn-primary btn-block">Add to
                                        Cart</a></p>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

</html>