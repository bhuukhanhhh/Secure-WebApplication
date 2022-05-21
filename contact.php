<?php require_once 'PHP/utils.php' ?>

<!DOCTYPE html>
<html>

<?php require_once 'including/metadata.html'; ?>

<body>
    <div>
        <?php require_once 'including/header.html';  ?>
    </div>

    <div>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><b>Contact Us</b></h3>
                        </div>

                        <div class="panel-body">
                            <p>Fill in your information below and we will contact you.</p>
                            <form method="post" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                                        required="true">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                        required="true">
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control" name="contact"
                                        placeholder="Enter your phone number" required="true">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="messages" rows="8"
                                        placeholder="Enter your message" style="resize: none;"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>

    <div>
        <?php require_once 'including/footer.html'; ?>
    </div>
</body>

</html>