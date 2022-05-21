<?php
require_once 'PHP/utils.php';
// if user is logged in then redirect to index.php
if (isset($_SESSION['username'])) {
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
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><b>SIGN UP</b></h3>
                        </div>

                        <div class="panel-body">

                            <p>Sign up for an account so you can go shopping online in our store.</p>

                            <form id="registerForm">

                                <div id="errs" class="errcontainer"></div>

                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" name="name"
                                        placeholder="Enter your name" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control" autocomplete="off" name="contact"
                                        placeholder="Enter your phone number"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" autocomplete="off" name="email"
                                        placeholder="Enter your email" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" name="username"
                                        placeholder="Enter your username" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter your password (minimum 8 characters)" required="true"
                                        pattern=".{8,}"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm-password"
                                        placeholder="Confirm your password" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}">
                                </div>

                                <div class="form-group">
                                    <div class="btn btn-primary" onclick="register();">Sign Up</div>
                                </div>

                            </form>
                        </div>
                        <div class="panel-footer">Already have an account? <a href="login.php">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>

    <script src="including/script.js"></script>

</body>

</html>