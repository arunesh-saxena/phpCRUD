<?php
session_start();

$valid_useridpasswords = array("admin" => "password");
$valid_userids = array_keys($valid_useridpasswords);

$userid = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$valid = (in_array($userid, $valid_userids)) && ($password == $valid_useridpasswords[$userid]);

// print_r($valid_userids);
// print_r($valid_useridpasswords);
echo '<br>';
print_r($valid_useridpasswords);

echo '<br>';
echo $userid . ' | ' . $password;
echo '<br>';
echo $valid ? 'true' : 'false';
echo '<br>';
print_r($_SESSION);


if ($valid) {
      $_SESSION['username'] = $userid;
      $_SESSION['password'] = $password;
      header("Location: ./");
} else {
      session_unset();
      // unset($_SESSION['username']);
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
                        <h3>Login | PHP CRUD Operations using PDO Extension</h3>
                        <hr />
                  </div>
            </div>
            <?php
            if ((!isset($_POST['username'])) || (!isset($_POST['password'])) || !$valid) {
            ?>
                  <form method="post" action="">
                        Username: <input type="text" pattern=".{5,}" title="Userid must contain 5 or more characters." name="username" id="username" required /><br />
                        <!-- Password: <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one uppercase and lowercase letter, and at least 8 total characters." name="password" id="password" required /><br /> -->
                        Password: <input type="password" title="Password must contain at least 8 number." name="password" id="password" required /><br />
                        <input type="submit" value="Login">
                  </form>
            <?php
            }
            if (!$valid) {
            ?>
                  <h3>Invalid user and password</h3>
            <?php
            }

            ?>
      </div>
</body>

</html>