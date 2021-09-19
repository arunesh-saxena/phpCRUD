<?php
// include database connection file
require_once 'db.php';
if (isset($_POST['insert'])) {
    $lastInsertId = insertUser([
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname'],
        'emailId' =>  $_POST['emailid'],
        'contactNo' => $_POST['contactno'],
        'address' => $_POST['address']
    ]);

    // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
    if ($lastInsertId) {
        // Message for successfully insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Message for unsuccessfully insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using PDO Extension </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Insert Record | PHP CRUD Operations using PDO Extension</h3>
                <hr />
            </div>
        </div>
        <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-4"><b>First Name</b>
                    <input type="text" name="firstname" class="form-control" required>
                </div>
                <div class="col-md-4"><b>Last Name</b>
                    <input type="text" name="lastname" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email id</b>
                    <input type="email" name="emailid" class="form-control" required>
                </div>
                <div class="col-md-4"><b>Contactno</b>
                    <input type="text" name="contactno" class="form-control" maxlength="10" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"><b>Address</b>
                    <textarea class="form-control" name="address" required></textarea>
                </div>
            </div>
            <div class="row" style="margin-top:1%">
                <div class="col-md-2">
                    <input class="btn btn-primary" type="submit" name="insert" value="Submit">
                </div>
                <div class="col-md-1">
                    <a class="btn" href="./">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>