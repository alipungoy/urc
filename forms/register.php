<?php
require_once('../vendor/autoload.php');
include('../db/connection.php');
$db = new db();

// form variables
$FORM_USERNAME = $_POST['USERNAME'];
$FORM_PASSWORD = password_hash(trim($_POST['PASSWORD']), PASSWORD_DEFAULT);
$FORM_EMAIL = $_POST['EMAIL'];
$FORM_FIRSTNAME = $_POST['FIRST_NAME'];
$FORM_LASTNAME = $_POST['LAST_NAME']; 
$FORM_SUFFIX = $_POST['suffix']; 
$FORM_CLASSIFICATION = $_POST['classification']; 
$USERTYPE = 'user';
$TOKEN = bin2hex(random_bytes(50)); //Generate token used for email verification
$DATE = date("y-m-d");

 try {
     $sql=("SELECT username, email  FROM user WHERE username = :username or email = :email ");
     $stmt = $db->connection->prepare($sql);
     $stmt->bindParam(':username', $FORM_USERNAME);
     $stmt->bindParam(':email', $FORM_EMAIL);
     $stmt->execute();
     $row=$stmt->fetch(PDO::FETCH_ASSOC);

     if (is_array($row)) {
         // Check if username is existing in database
         if ($row['username']==$FORM_USERNAME) {
             die(json_encode(array(
               'error' => array(
                   'msg' => 'Username already exist',
                   'code' => 401,
               ),
           )));
         }

         // Check if email is existing in database
         if ($row['email']==$FORM_EMAIL) {
             die(json_encode(array(
               'error' => array(
                  'msg'  => 'Email already exist'
               ),
           )));
         }
     } else {
         //if email or username is not existing in database run this code
         $sql = "INSERT INTO user (username, first_name, last_name, email, token, dateCreated, suffix, classification, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $db->connection->prepare($sql);
         $stmt->bindParam(1, $FORM_USERNAME);
         $stmt->bindParam(2, $FORM_FIRSTNAME);
         $stmt->bindParam(3, $FORM_LASTNAME);
         $stmt->bindParam(4, $FORM_EMAIL);
         $stmt->bindParam(5, $TOKEN);
         $stmt->bindParam(6, $DATE);
         $stmt->bindParam(7, $FORM_SUFFIX);
         $stmt->bindParam(8, $FORM_CLASSIFICATION);
         $stmt->bindParam(9, $USERTYPE);
         $stmt->execute();
         $lastID = $db->connection->lastInsertId();
        
         if($stmt){
            $sql2 = "INSERT INTO authentication (password, userID) SELECT ?, userID FROM user WHERE userID = ? ";
            $stmt = $db->connection->prepare($sql2);
            $stmt->bindParam(1, $FORM_PASSWORD);
            $stmt->bindParam(2, $lastID);
            $stmt->execute();  
         }


         

 /*        $transport = (new Swift_SmtpTransport('smtp.google.com', 465))
         ->setUsername('mfaulan@gmail.com')
         ->setPassword('p455w0rd12')
       ;
       

       $mailer = new Swift_Mailer($transport);

       $message = (new Swift_Message('Wonderful Subject'))
         ->setFrom(['mfaulan@gmail.com' => 'URC'])
         ->setTo([$FORM_EMAIL])
         ->setBody('Please click this link to verify account http://127.0.0.1/urc/pages/confirmation.php?token='.$TOKEN);

       $sendmail = $mailer->send($message);
         

        if($sendmail){*/
        die(json_encode(array('result' => 'success')));
//echo "success";
//}
     }
 } catch (PDOException $e) {
     die(json_encode(array(
         'error' => array(
             'msg' => $e->getMessage(),
             'code' => $e->getCode(),
         ),
     )));
 }
?> 