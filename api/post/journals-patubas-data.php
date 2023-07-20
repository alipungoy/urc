<?php
// upload_and_parse.php
require '../../db/connection.php';
$db = new db();

$id = $_POST['id'];

// Function to parse the metadata of a PDF file using Smalot\PdfParser
function parsePDFMetadata($filePath)
{
    require '../../libs/autoload.php'; // Include the autoload file
    $config = new \Smalot\PdfParser\Config();
    $config->setFontSpaceLimit(-50);

    $parser  = new \Smalot\PdfParser\Parser([], $config);
    $pdf = $parser->parseFile($filePath);
    $metadata = $pdf->getDetails(); // Metadata of the PDF
    $text = $pdf->getText(); // Get the PDF text content

    // Return the parsed metadata and text content as an array
    return array('metadata' => $metadata, 'text' => $text);
}

// Function to extract the abstract from the PDF text content
function extractAbstractFromText($text)
{
    // Regular expression pattern to match the abstract
    $pattern = '/(?i)\bAbstract\b\s*:?([\s\S]*?)(?=\b\w+\b|\Z)/'; // Match "Abstract" followed by any text until the next word or end of string
    preg_match($pattern, $text, $matches);

    if (isset($matches[1])) {
        // Clean up the abstract text by removing leading and trailing whitespace
        $abstract = trim($matches[1]);
        return $abstract;
    }

    // Return an empty string if no abstract is found
    return '!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if files were uploaded
    if (isset($_FILES['dataFiles']) && is_array($_FILES['dataFiles']['tmp_name'])) {
        // Array to store the parsed metadata of each PDF file
        $parsedData = array();

        // Loop through the uploaded files
        foreach ($_FILES['dataFiles']['tmp_name'] as $index => $tmpFile) {
            // Check if the file was uploaded successfully
            if ($_FILES['dataFiles']['error'][$index] === UPLOAD_ERR_OK) {
                $originalName = $_FILES['dataFiles']['name'][$index];
                $tempFilePath = $_FILES['dataFiles']['tmp_name'][$index];

                $result = parsePDFMetadata($tempFilePath);
                $metadata = $result['metadata'];
                $text = $result['text'];

                // Extract information from the metadata to insert into the database
                $title = isset($metadata['Title']) ? $metadata['Title'] : '';
                $authors = isset($metadata['Author']) ? $metadata['Author'] : '';

                // Extract the abstract from the PDF text content
                $abstract = extractAbstractFromText($text);

                // Insert the parsed data into the database
                $query = "INSERT INTO journal_patubas_details (journal_id, title, authors, abstract) VALUES (:journal_id, :title, :authors, :abstract)";
                $params = array(
                    ':journal_id' => $id,
                    ':title' => $title,
                    ':authors' => $authors,
                    ':abstract' => $abstract,
                );

                // Prepare the SQL query
                $statement = $db->connection->prepare($query);

                // Execute the query with the parameters
                if ($statement->execute($params)) {
                    // Add the parsed metadata to the array
                    $parsedData[] = array(
                        'metadata' => $metadata,
                        'text' => $text
                    );
                } else {
                    // Handle the database insertion error if needed
                }
            }
        }

        // Return the parsed data as JSON response
        echo json_encode($parsedData);
    } else {
        $response = ['type' => 'error', 'message' => 'No files uploaded'];
        echo json_encode($response);
    }
} else {
    $response = ['type' => 'error', 'message' => 'Invalid request method'];
    echo json_encode($response);
}
