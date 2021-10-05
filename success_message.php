<?php
include "includes/header.php"; //Require page header!
?>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row" style="width: 95%; margin: 0 auto;">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading pt-3">
                            <h2>Registration</h2>
                        </div>
                        <div class="panel-body pt-3">
                            <div class="alert alert-primary" role="alert">
                                <center>
                                    <strong><?php echo $_GET['registration_status']; ?></strong>
                                    <br><br>
                                    <a href="index.php"><button type="submit" class="form-control btn btn-primary">Go Back For New Registration</button></a>
                                </center>
                            </div>
                            <br><br><br>
                            <center><a href="../mymail"><button type="submit" class="form-control btn btn-primary">Go to your Mailbox</button></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; //require footer of the page! 
?>