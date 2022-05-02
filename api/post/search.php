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
            $searchQuery = " AND (title LIKE :title OR 
            abstract LIKE :abstract OR authors LIKE :authors) ";
            $searchArray = array(
                'title' => "%$SEARCH_QUERY%",
                'abstract' => "%$SEARCH_QUERY%",
                'authors' => "%$SEARCH_QUERY%"
            );

            $search = ("SELECT journals.id, journals.publication_date, journals.cover_photo, journal_patubas_details.title, journal_patubas_details.authors, journal_patubas_details.abstract FROM journals LEFT JOIN journal_patubas_details ON journals.id = journal_patubas_details.journal_id WHERE 1 ".$searchQuery." GROUP BY journals.id LIMIT 10");
            $stmt = $db->connection->prepare($search);
            foreach($searchArray as $key=>$search){
                $stmt->bindValue(':'.$key, $search, PDO::PARAM_STR);
            }
            $stmt->execute();
            

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
               $title = $row['title'];
               $abstract = $row['abstract'];
               $authors = $row['authors'];

               $searchResult[] = array(
                   'id' => $id,
                   'title' => $title,
                   'abstract' => $abstract,
                   'authors' => $authors
               );
               $error = json_last_error();

                echo json_encode($searchResult);
            }
            
        } else {
            echo json_encode('empty');
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
