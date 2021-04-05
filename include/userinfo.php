<?php
    session_start();
    include('../db/connection.php');

    $db = new db();

    $userid = $_SESSION['userid'];
    
        $sql = ("SELECT * FROM user WHERE userID = :userid");
        $stmt = $db->connection->prepare($sql);
        $stmt->execute(array(
            ':userid' => $userid
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['userID'] === $userid){
        echo  '<div class="col-sm-8">
        <div class="profile-user-details clearfix">
            <div class="profile-user-details-label">
                First Name
            </div>
            <div class="profile-user-details-value">
                '.$row['first_name'].'
            </div>
        </div>
        <div class="profile-user-details clearfix">
            <div class="profile-user-details-label">
                Last Name
            </div>
            <div class="profile-user-details-value">
                '.$row['last_name'].'
            </div>
        </div>
        <div class="profile-user-details clearfix">
            <div class="profile-user-details-label">
                Address
            </div>
            <div class="profile-user-details-value">
            TEST ADDRESS
            </div>
        </div>
        <div class="profile-user-details clearfix">
            <div class="profile-user-details-label">
                Email
            </div>
            <div class="profile-user-details-value">
               '.$row['email'].'
            </div>
        </div>
        <div class="profile-user-details clearfix">
            <div class="profile-user-details-label">
                Phone number
            </div>
            <div class="profile-user-details-value">
                011 223 344 556 677
            </div>
        </div>
    </div>';

        };
?>