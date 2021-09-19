<?php
// include database connection file
require_once 'db.php';

/* fetch user form table users */
$users = fetchUsers();

// Code for record deletion
if (isset($_REQUEST['del'])) {
    //Get row id
    $uid = intval($_GET['del']);
    deleteUser($uid);
    echo "<script>alert('Record deleted successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PDO Extension </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-12">

                <?php
                session_start();
                if ((!isset($_SESSION['username'])) || (!isset($_SESSION['password']))) {
                    echo "You must login to access the ABC Canine Shelter Reservation System";
                    echo "<p>";
                    echo "<a href='login.php'>Login</a> | <a href='register.php'>Create an account</a>";
                    echo "</p>";
                } else {
                    echo "<p>Welcome back, " . $_SESSION['username'] . "</p>";
                } ?>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <h3>PHP CRUD Operations using PDO Extension</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Posting Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php

                            //In case that the query returned at least one record, we can echo the records within a foreach loop:
                            foreach ($users as $key => $result) {
                            ?>
                                <!-- Display Records -->
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $result->FirstName .' | '. $result->id; ?></td>
                                    <td><?php echo $result->LastName; ?></td>
                                    <td><?php echo $result->EmailId; ?></td>
                                    <td><?php echo $result->ContactNumber; ?></td>
                                    <td><?php echo $result->Address; ?></td>
                                    <td><?php echo $result->PostingDate; ?></td>
                                    <td><a href="update.php?id=<?php echo $result->id; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    <td><a href="index.php?del=<?php echo $result->id; ?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>