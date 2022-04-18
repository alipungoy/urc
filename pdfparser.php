<?php
require 'vendor/autoload.php';
$parser  = new \Smalot\PdfParser\Parser();
$filename =  $_POST['filename'];


$pdf = $parser->parseFile('uploads/' . $filename . ' ');

$text = $pdf->getText();

echo $text;
