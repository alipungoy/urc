<?php

include('../../db/connection.php');
$db = new db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // form variables
    $form_USERNAME = $_POST['USERNAME'];
    $form_PASSWORD = $_POST['PASSWORD'];

    try {
        $sql = ("SELECT * FROM user 
    LEFT JOIN authentication ON user.userID = authentication.userID WHERE username = :username OR email = :username");
        $stmt = $db->connection->prepare($sql);
        $stmt->bindParam(':username', $form_USERNAME);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stmt->rowCount();
    
        // Check if username is existing in database
        if ($rowCount > 0) {
            if (password_verify($form_PASSWORD, $row['password'])) {
                session_start();

                $_SESSION['loggedin'] = true;
                $_SESSION['username']  = $row['username'];
                $_SESSION['userid']  = $row['userID'];
                $_SESSION['first_name']  = $row['first_name'];
                $_SESSION['last_name']  = $row['last_name'];
                $_SESSION['user_type'] = $row['user_type'];

                die(json_encode(array('result' => 'Succesfully logged in')));
            } else {
                die(json_encode(array(
                'error' => array(
                    'msg' => 'Invalid Username or password'
                ),
            )));
            }
        } else {
            die(json_encode(array(
            'error' => array(
                'msg' => 'User not found'
            ),
        )));
        }
    } catch (Exception $e) {
        die(json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    )));
    }
}