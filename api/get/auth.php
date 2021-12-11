<?php
session_start();
include('../../db/connection.php');

$db = new db();
$userid = $_SESSION['userid'];
$info = array();
try {
    $userdetails = ("SELECT * FROM user WHERE userID = :userid");
    $stmt = $db->connection->prepare($userdetails);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();

    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $fName = $row['first_name'];
        $lName = $row['last_name'];
        $suffix = $row['suffix'];
        $email = $row['email'];
        $type = $row['user_type'];
        $classification = $row['classification'];

        $info[] = array(
            "fname" => $fName,
            "lname" => $lName,
            "suffix" => $suffix,
            "email" => $email,
            "type" => $type,
            "classification" => $classification
        );

        // TODO: Hacks only
        echo json_encode($info[0]);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
