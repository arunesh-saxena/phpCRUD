
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    $result = [
        'status' => 'fail',
        'message' => 'PUT call require'
    ];
    exit(json_encode($result));
}

$userId = isset($_GET['id']) ? intval($_GET['id']) : null;


if (!$userId) {
    $result = [
        'status' => 'fail',
        'message' => 'ID require to update the user'
    ];
    exit(json_encode($result));
}

/* reading data from body json */
$data = json_decode(file_get_contents('php://input'), true);

list(
    'fname' => $firstName,
    'lname' => $lastName,
    'emailId' =>  $emailId,
    'contactNo' => $contactNo,
    'address' => $address
) = $data + ['fname' => null, 'lname' => null, 'emailId' => null, 'contactNo' => null, 'address' => null];

if (!$firstName || !$lastName) {
    $result = [
        'status' => 'fail',
        'message' => 'fname and lname can not be empty'
    ];
    exit(json_encode($result));
}


$user = updateUser([
    'userId' => $userId,
    'fname' => $firstName,
    'lname' => $lastName,
    'emailId' =>  $emailId,
    'contactNo' => $contactNo,
    'address' => $address
]);

if ($user) {
    $result = [
        'status' => 'success',
        'message' => "Record Updated successfully with id $userId",
        'user' => $user
    ];
} else {
    $result = [
        'status' => 'fail',
        'message' => "Something wen wrong"
    ];
}



echo json_encode($result);
