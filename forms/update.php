<?php
session_start();
include('../db/connection.php');
$db = new db();

$FORM_fName = $_POST['FIRST_NAME'];
$FORM_lName = $_POST['LAST_NAME'];
$FORM_ADDRESS = $_POST['ADDRESS'];
$FORM_CONTACT = $_POST['CONTACT_NUMBER'];
$userid = $_SESSION['userid'];


try{
 
        $sql = ("UPDATE users SET fName=:fName, lName=:lName, address=:address, contact_no=:contactNo WHERE user_id = :userid");
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam('fName', $FORM_fName);
        $stmt->bindParam('lName', $FORM_lName);
        $stmt->bindParam('address', $FORM_ADDRESS);
        $stmt->bindParam('contactNo', $FORM_CONTACT);
        $stmt->bindParam('userid', $userid);
        $stmt->execute();

        die (json_encode(array('result' => 'User Info Updated')));
    }
catch (PDOException $e) {
    die(json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    )));

}
?>