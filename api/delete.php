<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    $result = [
        'status' => 'fail',
        'message' => 'DELETE call require'
    ];
    exit(json_encode($result));
}

$userId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$userId) {
    $result = [
        'status' => 'fail',
        'message' => 'ID require to delete the user'
    ];
    exit(json_encode($result));
}

deleteUser($userId);

$result = [
    'status' => 'success',
    'message' => "Record with ID $userId deleted successfully"
];


echo json_encode($result);
