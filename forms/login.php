<?php
session_start();
include('../db/connection.php');

$db = new db();

    // form variables
    $form_USERNAME = $_POST['USERNAME'];
    $form_PASSWORD = $_POST['PASSWORD'];

    try {
        // sql here
        $stmt = $db->connection->prepare("SELECT username FROM users WHERE username = :username "); 
        $stmt->execute(array(':username'=>$form_USERNAME));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        

        
       if($stmt->rowCount() > 0){
        if(password_verify($form_PASSWORD, $userRow['password'])){
            //session variables
            $_SESSION['user_id'] = $userRow['user_id'];
            $_SESSION['username'] = $userRow['username'];   

         header('location: ./user-home.php');
    }
    else
    {
        echo json_encode(array(
            'error' => array(
                'msg' => 'Incorrect username or password'
            ),
        ));
    }
}

    } catch (Exception $e) {
        echo json_encode(array(
            'error' => array(
                'msg' => $e->getMessage(),
                'code' => $e->getCode(),
            ),
        ));
    }
 ?> 
