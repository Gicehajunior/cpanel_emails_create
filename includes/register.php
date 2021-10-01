<?php
include "config.php";
if (isset($_POST['register_email_user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['uname'] . "@llkll.net";
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $terms = $_POST["terms"];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");


    /* Form Required Field Validation */
    if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($password) || empty($gender)) {
        $error = "All Fields are Required";
        header('Location: ../index.php?registration_status=' . $error . '');
        exit();
    }
    /* Password Matching Validation */
    if ($password != $confirm_password) {
        $error = 'Passwords should be the same!';
        header('Location: ../index.php?registration_status=' . $error . '');
        exit();
    }

    /* Validation to check if Terms and Conditions are accepted */
    if (empty($terms)) {
        $error = "Accept Terms and Conditions to Register";
        header('Location: ../index.php?registration_status=' . $error . '');
        exit();
    }

    if (!$error) {
        // create email on the server.
        require_once('cPanelApi.php');
        $connect_api = new cPanelApi("llkll.net", "llwllnet", "Rashad99412522");

        if ($connect_api) {
            $create_email = $connect_api->createEmail($uname, $password, '500');
            
            if ($create_email) {
                $query = "INSERT INTO email_users (uname, fname, lname, password, email, gender, created_at, updated_at) VALUES('$uname', '$fname', '$lname', '$password', '$email', '$gender', '$created_at', '$updated_at')";
                $execute_query = mysqli_query($connection, $query);

                if ($execute_query) {
                    $registration_status = "Email Registration Successfull!.";
                    header('Location: ../success_message.php?registration_status=' . $registration_status . '');
                    exit();
                }
            } else {
                $registration_status = "Oops. Something went wrong. Please try again!.";
                header('Location: ../index.php?registration_status=' . $registration_status . '');
                exit();
            }
        } else {
            $registration_status = "Oops. Unexpected Server Error!.";
            header('Location: ../index.php?registration_status=' . $registration_status . '');
            exit();
        }
    }
}
