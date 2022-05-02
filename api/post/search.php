<?php
include('../../db/connection.php');
$db = new db();

$SEARCH_QUERY = $_POST['term'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $check = ("SELECT * FROM journal_patubas_details WHERE title LIKE  '%" . $SEARCH_QUERY . "%' OR abstract LIKE '%" . $SEARCH_QUERY . "%' OR authors LIKE '%" . $SEARCH_QUERY . "%'");
        $stmt = $db->connection->prepare($check);
        $stmt->execute();
        $result = $stmt->rowCount();

        if ($result >= '1') {
            $search = ("SELECT * FROM journal_patubas_details WHERE title LIKE  '%" . $SEARCH_QUERY . "%' OR abstract LIKE '%" . $SEARCH_QUERY . "%' OR authors LIKE '%" . $SEARCH_QUERY . "%'");
            $stmt = $db->connection->prepare($search);
            $stmt->execute();
           

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $searchresult[] = (array(
                    'id' => $row['journal_id'],
                    'title' => $row['title'],
                    'abstract' => $row['abstract'],
                    'authors' => $row['authors']
                ));

                echo json_encode($searchresult);
            }
        }
        else {
            echo json_encode('empty');
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
