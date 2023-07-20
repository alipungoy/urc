<?php

require 'libs/autoload.php';

// Function to extract text from a PDF file using Smalot\PdfParser
function getPDFText($filePath)
{
    $config = new \Smalot\PdfParser\Config();
    $config->setFontSpaceLimit(-50);

    $parser = new \Smalot\PdfParser\Parser([], $config);
    $pdf = $parser->parseFile($filePath);
    $text = $pdf->getText(); // Get the PDF text content

    return $text;
}

// Example usage:
$filePath = 'journals/sample.pdf'; // Replace with the actual path to your PDF file
$pdfText = getPDFText($filePath);
echo $pdfText;