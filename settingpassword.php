<?php
require_once 'PHP/utils.php';
// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username'])) {
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
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><b>Changing Password</b></h3>
                        </div>

                        <div class="panel-body">

                            <p>Fill in your information below for changing passwords</p>

                            <form id="changingPassword">

                                <div id="errs" class="errcontainer"></div>

                                <div class="form-group">
                                    <input id="oldPass" type="password" class="form-control" name="oldPassword"
                                        placeholder="Old password" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();changingPassword();}">
                                </div>

                                <div class="form-group">
                                    <input id="newPass" type="password" class="form-control" name="newPassword"
                                        placeholder="New password" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();changingPassword();}">
                                </div>

                                <div class="form-group">
                                    <input id="confirmPass" type="password" class="form-control" name="retypingPassword"
                                        placeholder="Confirm new password" required="true"
                                        onkeydown="if(event.key === 'Enter'){event.preventDefault();changingPassword();}">
                                </div>

                                <div class="form-group">
                                    <div class="btn btn-primary" onclick="changingPassword();">Change</div>
                                </div>

                            </form>
                        </div>
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