<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $result = [
        'status' => 'fail',
        'message' => 'GET call require'
    ];
    exit(json_encode($result));
}

$userId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($userId) {
    $record = fetchUsersByID($userId);
    $user = null;
    if ($record) {
        [$user] = $record;
    }
    $result = [
        'status' => 'success',
        '$userId ' => $userId,
        'user' => $user,
    ];
} else {
    $record = fetchUsers();
    $result = [
        'status' => 'success',
        'userList' => $record,
    ];
}

echo json_encode($result);
