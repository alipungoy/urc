<?php
require('../vendor/PHPMailer/PHPMailerAutoload.php');
include('../db/connection.php');
$db = new db();


// form variables
$FORM_USERNAME = $_POST['USERNAME'];
$FORM_PASSWORD = password_hash(trim($_POST['PASSWORD']), PASSWORD_DEFAULT);
$FORM_EMAIL = $_POST['EMAIL'];
$FORM_FIRSTNAME = $_POST['FIRST_NAME'];
$FORM_LASTNAME = $_POST['LAST_NAME'];
$FORM_SUFFIX = $_POST['suffix'];
$FORM_DEPT = $_POST['dept'];
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
         $sql = "INSERT INTO user (username, first_name, last_name, email, token, dateCreated, suffix, department,  classification, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $db->connection->prepare($sql);
         $stmt->bindParam(1, $FORM_USERNAME);
         $stmt->bindParam(2, $FORM_FIRSTNAME);
         $stmt->bindParam(3, $FORM_LASTNAME);
         $stmt->bindParam(4, $FORM_EMAIL);
         $stmt->bindParam(5, $TOKEN);
         $stmt->bindParam(6, $DATE);
         $stmt->bindParam(7, $FORM_SUFFIX);
         $stmt->bindParam(8, $FORM_DEPT);
         $stmt->bindParam(9, $FORM_CLASSIFICATION);
         $stmt->bindParam(10, $USERTYPE);
         $stmt->execute();
         $lastID = $db->connection->lastInsertId();
        
         if ($stmt) {
             $sql2 = "INSERT INTO authentication (password, userID) SELECT ?, userID FROM user WHERE userID = ? ";
             $stmt = $db->connection->prepare($sql2);
             $stmt->bindParam(1, $FORM_PASSWORD);
             $stmt->bindParam(2, $lastID);
             $stmt->execute();
                
             $mail = new PHPMailer;

             //Tell PHPMailer to use SMTP
             $mail->isSMTP();
                
             //Enable SMTP debugging
             // 0 = off (for production use)
             // 1 = client messages
             // 2 = client and server messages
             $mail->SMTPDebug = 0;
                
             //Ask for HTML-friendly debug output
             $mail->Debugoutput = 'html';
                
             //Set the hostname of the mail server
             $mail->Host = 'smtp.gmail.com';
             // use
             // $mail->Host = gethostbyname('smtp.gmail.com');
             // if your network does not support SMTP over IPv6
                
             //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
             $mail->Port = 587;
                
             //Set the encryption system to use - ssl (deprecated) or tls
             $mail->SMTPSecure = 'tls';
                
             //Whether to use SMTP authentication
             $mail->SMTPAuth = true;
                
             //Username to use for SMTP authentication - use full email address for gmail
             $mail->Username = "urc.thesis.test@gmail.com";
                
             //Password to use for SMTP authentication
             $mail->Password = "urcthesistest1234";
                
             //Set who the message is to be sent from
             $mail->setFrom('urc.thesis.test@gmail.com', 'URC');
                
             //Set who the message is to be sent to
             $mail->addAddress($FORM_EMAIL);
                
             $mail->isHTML(true);

             //Set the subject line
             $mail->Subject = 'Account Activation';
                
             $mail->Body = 'Please click this link to verify account http://127.0.0.1/urc/pages/confirmation.php?token='.$TOKEN;

             //Replace the plain text body with one created manually
             $mail->AltBody = 'This is a plain-text message body';

             if ($mail->send()) {
                 echo json_encode(array('result'=>'success'));
             }
         }
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