<?php
include('../../db/connection.php');
$db = new db();

$SEARCH_QUERY = $_POST['term'];
$SEARCH_QUERY = htmlspecialchars($SEARCH_QUERY, ENT_QUOTES, 'UTF-8'); // Escape HTML entities

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $searchTerms = explode(" ", $SEARCH_QUERY); // Split search term into individual words

        // Build the search query to search for any of the words in title, abstract, or authors
        $searchQuery = " AND (";
        $searchParams = array();
        foreach ($searchTerms as $index => $term) {
            $key = ":term" . $index;
            $searchParams[$key] = "%" . $term . "%";
            if ($index > 0) {
                $searchQuery .= " OR ";
            }
            $searchQuery .= "title LIKE " . $key . " OR abstract LIKE " . $key . " OR authors LIKE " . $key;
        }
        $searchQuery .= ")";

        $search = ("SELECT journals.id, journals.publication_date, journals.cover_photo, journal_patubas_details.title, journal_patubas_details.authors, journal_patubas_details.abstract FROM journals LEFT JOIN journal_patubas_details ON journals.id = journal_patubas_details.journal_id WHERE 1 " . $searchQuery . " GROUP BY journals.id LIMIT 10");
        $stmt = $db->connection->prepare($search);
        $stmt->execute($searchParams);

        $result = $stmt->rowCount();
        if ($result >= '1') {
            $searchResult = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $title = $row['title'];
                $abstract = $row['abstract'];
                $authors = $row['authors'];

                // Highlight the search terms in title, abstract, and authors
                foreach ($searchTerms as $term) {
                    $title = highlightSearchTerm($term, $title);
                    $abstract = highlightSearchTerm($term, $abstract);
                    $authors = highlightSearchTerm($term, $authors);
                }

                $searchResult[] = array(
                    'id' => $id,
                    'title' => $title,
                    'abstract' => $abstract,
                    'authors' => $authors
                );
            }

            echo json_encode($searchResult);
        } else {
            echo json_encode(array('message' => 'empty'));
        }
    } catch (Exception $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

// Function to highlight the search term in the text
function highlightSearchTerm($searchTerm, $text)
{
    $highlightedText = str_ireplace($searchTerm, '<span class="highlighted">' . $searchTerm . '</span>', $text);
    return $highlightedText;
}
?>