<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $result = [
        'status' => 'fail',
        'message' => 'POST call require'
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
$lastInsertId = insertUser([
    'fname' => $firstName,
    'lname' => $lastName,
    'emailId' =>  $emailId,
    'contactNo' => $contactNo,
    'address' => $address
]);

if ($lastInsertId) {
    $result = [
        'status' => 'success',
        'message' => "Record added successfully id: $lastInsertId"
    ];
} else {
    $result = [
        'status' => 'fail',
        'message' => 'some thing went wrong'
    ];
}

echo json_encode($result);
