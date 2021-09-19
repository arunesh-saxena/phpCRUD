<?php
// include database connection file
require_once 'dbconfig.php';

/**
 * @description fetch the user info from tblusers
 */
function fetchUsers()
{
    global $PDO;
    // $GLOBALS["PDO"];
    $sql = "SELECT FirstName,LastName,EmailId,ContactNumber,Address,PostingDate,id from tblusers";
    //Prepare the query:
    $query = $PDO->prepare($sql);
    //Execute the query:
    $query->execute();
    //Assign the data which you pulled from the database (in the preceding step) to a variable.
    return  $query->fetchAll(PDO::FETCH_OBJ);
}

/**
 * @description fetch the user info by id from tblusers
 */
function fetchUsersByID($userid)
{
    global $PDO;

    $sql = "SELECT FirstName,LastName,EmailId,ContactNumber,Address,PostingDate,id from tblusers where id=:uid";
    //Prepare the query:
    $query = $PDO->prepare($sql);
    //Bind the parameters
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    //Execute the query:
    $query->execute();
    //Assign the data which you pulled from the database (in the preceding step) to a variable.
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $isResult =  $query->rowCount() < 0;
    return $isResult ? null : $results;
}

/**
 * @description  insert the user data to tblusers
 */

function insertUser($data)
{
    [
        'fname' => $fname,
        'lname' => $lname,
        'emailId' => $emailId,
        'contactNo' => $contactNo,
        'address' => $address
    ] = $data;
    global $PDO;
    $sql = "INSERT INTO tblusers(FirstName,LastName,EmailId,ContactNumber,Address) VALUES(:fn,:ln,:eml,:cno,:adrss)";
    //Prepare Query for Execution
    $query = $PDO->prepare($sql);
    // Bind the parameters
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    $query->bindParam(':eml', $emailId, PDO::PARAM_STR);
    $query->bindParam(':cno', $contactNo, PDO::PARAM_STR);
    $query->bindParam(':adrss', $address, PDO::PARAM_STR);
    // Query Execution
    $query->execute();
    // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
    $lastInsertId = $PDO->lastInsertId();

    return $lastInsertId;
}

/**
 * @description delete the user from tblusers
 */

function deleteUser($uid)
{
    global $PDO;
    //Query for deletion
    $sql = "delete from tblusers WHERE  id=:id";
    // Prepare query for execution
    $query = $PDO->prepare($sql);
    // bind the parameters
    $query->bindParam(':id', $uid, PDO::PARAM_STR);
    // Query Execution
    $query->execute();
}

/**
 * @description delete the user from tblusers
 */

function updateUser($data)
{
    [
        'userId' =>  $userid,
        'fname' => $fname,
        'lname' => $lname,
        'emailId' => $emailId,
        'contactNo' => $contactNo,
        'address' => $address
    ] = $data;
    global $PDO;
    // Query for Updating
    $sql = "update tblusers set FirstName=:fn,LastName=:ln,EmailId=:eml,ContactNumber=:cno,Address=:adrss where id=:uid";
    //Prepare Query for Execution
    $query = $PDO->prepare($sql);
    // Bind the parameters
    $query->bindParam(':fn', $fname, PDO::PARAM_STR);
    $query->bindParam(':ln', $lname, PDO::PARAM_STR);
    $query->bindParam(':eml', $emailId, PDO::PARAM_STR);
    $query->bindParam(':cno', $contactNo, PDO::PARAM_STR);
    $query->bindParam(':adrss', $address, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);
    // Query Execution
    $query->execute();

    $updatedRow = $query->rowCount();
    if ($updatedRow) {
        $updatedUser = fetchUsersByID(($userid));
        if ($updatedUser) {
            return $updatedUser;
        } else {
            return null;
        }
    } else {
        return null;
    }
}
