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
                            <h3><b>LOGIN</b></h3>
                        </div>

                        <div class="panel-body">

                            <p>Login to make a purchase.</p>

                            <form id="loginForm">

                                <div id="errs" class="errcontainer"></div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        autocomplete="off" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        autocomplete="off" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}">
                                </div>

                                <div class="form-group">
                                    <div class="btn btn-primary" onclick="login();">Log In</div>
                                </div>

                            </form>
                        </div>

                        <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>
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