<?php
date_default_timezone_set("Asia/Manila");
include("../db/connection.php");
$db = new db();

$id = $_POST['resId'];
$date = $_POST['approvalDate'];


$insert = ("UPDATE proposal SET approvalDate = '".$date."', status = 'Research Approved', approved = '1' WHERE proposalID = '".$id."' ");
$stmt = $db->connection->prepare($insert);
$stmt->execute();

if ($stmt) {
    $query_insert = "INSERT INTO `approved_proposals`(`proposalID`,`title`, `classification`, `approval_date`, `status`, `added`)
                 SELECT proposal.proposalID, proposal.title, proposal.funding, proposal.approvalDate, 'Ongoing', 0
                 FROM proposal
                 LEFT Join approved_proposals
                 on proposal.proposalID = approved_proposals.proposalID
                 Where proposal.approved = '1' and approved_proposals.proposalID IS NULL";
    $stmt = $db->connection->prepare($query_insert);
    $stmt->execute();
    $lastid = $db->connection->lastInsertId();

    // $query_id = "SELECT LAST_INSERT_ID() as id";
    // $stmt = $db->connection->prepare($query_id);
    // $stmt->execute();

    // $row_id = $stmt->fetch(PDO::FETCH_ASSOC);
    // $last_id = $row_id['id'];

    // if($last_id == 0) {
    //   $last_id = NULL;
    // } else {
    //   $last_id = $last_id;
    // }

    $query_getid = "SELECT * FROM approved_proposals WHERE approvedID >= $lastid";
    $result_getid = $db->connection->prepare($query_getid);
    $result_getid->execute();

    if ($result_getid) {
        while ($row = $result_getid->fetch(PDO::FETCH_ASSOC)) {
            //query to get author using id and insert
            //echo $row['approvedID'];
            //echo " ";

            $author_query = "INSERT INTO authors (`fullName`,`ordinal`,`proposalID`)
                    SELECT proposal_authors.fullName, proposal_authors.ordinal, " . $row['approvedID'] . "
                    FROM proposal_authors
                    LEFT Join authors
                    on proposal_authors.proposal_id = authors.proposalID
                    WHERE proposal_authors.proposal_id = " . $row['proposalID'];
            $author_result = $db->connection->prepare($author_query);
            $author_result->execute();
        }
    }
    echo json_encode('success');
}
