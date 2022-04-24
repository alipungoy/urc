<?php
require '../../vendor/autoload.php';
$parser  = new \Smalot\PdfParser\Parser();
$filename = $_POST['filename'];
$file  = "C:/Users/Mikel/Downloads/$filename";

$pdf = $parser->parseFile($file);
$text = $pdf->getText();

$regular_spaces = preg_replace('/\xc2\xa0/', ' ', $text);
echo $regular_spaces;
