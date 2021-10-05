<?php 
include "includes/header.php"; //Require page header!
?>
<section class="container pb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row" style="width: 95%; margin: 0 auto;">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading pt-3">
                            <h2>Registration</h2>
                        </div>
                        <div class="panel-body pt-3">
                            <?php
                                if ($_GET['registration_status']) {

                                    echo   '<div class="alert alert-primary" role="alert">
                                                <strong>'. $_GET['registration_status'] .'</strong>
                                            </div>';
                                }
                            ?> 
                            <form method="POST" action="includes/register.php" enctype="multipart/form-data">
                                <label class="pt-3" for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" autocomplete="on">

                                <label class="pt-3" for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" autocomplete="on">

                                <label class="pt-3" for="lname">Email</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="uname" class="form-control" placeholder="Email Username" aria-label="Email username" aria-describedby="basic-addon2" autocomplete="on">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">@llkll.net</span>
                                    </div>
                                </div>

                                <label class="pt-3" for="fname">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="on">

                                <label class="pt-3" for="fname">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" autocomplete="on">
                                <small>Note: Input a strong and lengthy password, otherwise it will give a success even with no email created.</small>
                                <div class="pa pb-3">
                                    <label class="pt-3" for="fname">Gender</label>
                                    <input type="radio" name="gender" value="Male"> Male
                                    <input type="radio" name="gender" value="Female"> Female
                                </div>

                                <input type="checkbox" name="terms" class="" autocomplete="on"> I accept Terms and Conditions
                                <input type="submit" name="register_email_user" value="Register" class="btn btn-primary " style="width:100%; margin-top:10px;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; //require footer of the page! 
?>