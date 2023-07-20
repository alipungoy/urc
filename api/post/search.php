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
        $searchQuery2 = " AND (";
        $searchParams1 = array();
        $searchParams2 = array();
        
        foreach ($searchTerms as $index => $term) {
            $key1 = ":term1_" . $index;
            $key2 = ":term2_" . $index;
            $searchParams1[$key1] = "%" . $term . "%";
            $searchParams2[$key2] = "%" . $term . "%";
            
            if ($index > 0) {
                $searchQuery .= " OR ";
                $searchQuery2 .= " OR ";
            }
            $searchQuery .= "title LIKE " . $key1 . " OR abstract LIKE " . $key1 . " OR authors LIKE " . $key1;
            $searchQuery2 .= "title LIKE " . $key2 . " OR abstract LIKE " . $key2 . " OR author LIKE " . $key2;
        }
        $searchQuery .= ")";
        $searchQuery2 .= ")";

        $search = ("SELECT journals.id, journals.publication_date, journals.cover_photo, journal_patubas_details.title, journal_patubas_details.authors, journal_patubas_details.abstract, journal_patubas_details.link FROM journals LEFT JOIN journal_patubas_details ON journals.id = journal_patubas_details.journal_id WHERE 1 " . $searchQuery . " GROUP BY journals.id LIMIT 10");
        $stmt = $db->connection->prepare($search);
        $stmt->execute($searchParams1);

        $result = $stmt->rowCount();
        if ($result >= '1') {
            $searchResult = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $title = $row['title'];
                $abstract = $row['abstract'];
                $authors = $row['authors'];
                $link = $row['link'];

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
                    'authors' => $authors,
                    'link' => $link
                );
            }
        }

        // Add another search query for a different table
        $search2 = ("SELECT journals_scientia.id, journals_scientia.title, journals_scientia.abstract, journals_scientia.author, journals_scientia.link FROM journals_scientia WHERE 1 " . $searchQuery2 . " LIMIT 10");
        $stmt2 = $db->connection->prepare($search2);
        $stmt2->execute($searchParams2);

        $result2 = $stmt2->rowCount();
        if ($result2 >= '1') {
            while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                // Assuming journals_scientia has columns: id, title, abstract, author_name
                $id = $row['id'];
                $title = $row['title'];
                $abstract = $row['abstract'];
                $author = $row['author'];
                $link = $row['link'];

                // Highlight the search terms in title, abstract, and author_name
                foreach ($searchTerms as $term) {
                    $title = highlightSearchTerm($term, $title);
                    $abstract = highlightSearchTerm($term, $abstract);
                    $author = highlightSearchTerm($term, $author);
                }

                $searchResult[] = array(
                    'id' => $id,
                    'title' => $title,
                    'abstract' => $abstract,
                    'authors' => $author,
                    'link' => $link
                );
            }
        }

        // If there are no results from both tables
        if (empty($searchResult)) {
            echo json_encode(array('message' => 'empty'));
        } else {
            echo json_encode($searchResult);
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
