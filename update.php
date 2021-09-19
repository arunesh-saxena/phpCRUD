<?php
// include database connection file
require_once 'db.php';
if (isset($_POST['update'])) {
    updateUser([
        'userId' => intval($_GET['id']),
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname'],
        'emailId' =>  $_POST['emailid'],
        'contactNo' => $_POST['contactno'],
        'address' => $_POST['address']
    ]);


    // Message after updating
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='index.php'</script>";
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
                <h3>Update Record <?php echo  $_GET['id']; ?> | PHP CRUD Operations using PDO Extension</h3>
                <hr />
            </div>
        </div>
        <?php
        // Get the userid
        $userid = intval($_GET['id']);

        $data = fetchUsersByID($userid);

        if ($data) {
            [$user] = $data;
        ?>
            <form name="insertrecord" method="post">
                <div class="row">
                    <div class="col-md-4"><b>First Name</b>
                        <input type="text" name="firstname" value="<?php echo $user->FirstName; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4"><b>Last Name</b>
                        <input type="text" name="lastname" value="<?php echo $user->LastName; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>Email id</b>
                        <input type="email" name="emailid" value="<?php echo $user->EmailId; ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4"><b>Contactno</b>
                        <input type="text" name="contactno" value="<?php echo $user->ContactNumber; ?>" class="form-control" maxlength="10" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"><b>Address</b>
                        <textarea class="form-control" name="address" required><?php echo $user->Address; ?></textarea>
                    </div>
                </div>

                <div class="row" style="margin-top:1%">
                    <div class="col-md-2">
                        <input type="submit" name="update" value="Update">
                    </div>
                    <div class="col-md-1">
                        <a class="btn" href="./">Cancel</a>
                    </div>
                </div>
            </form>

        <?php } else {
            echo "<h2>User id : $userid data not found</<h2>";
        }
        ?>
    </div>
</body>

</html>