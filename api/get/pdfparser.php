<?php
require '../../libs/autoload.php';
$config = new \Smalot\PdfParser\Config();
$config->setFontSpaceLimit(-50);

$parser  = new \Smalot\PdfParser\Parser([], $config);

$valid_extensions = array('pdf'); // valid extensions]
$path = '../../test/';
$files = $_FILES['ftu'];
$img = $_FILES['ftu']['name'];
$tmp = $_FILES['ftu']['tmp_name'];
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$filename = uniqid();
$basename = $filename . "." . $ext;

$path = $path.strtolower($basename);
if (move_uploaded_file($tmp, $path)) {
    $file  = "../../test/" . $basename;
    $pdf = $parser->parseFile($file);
    $metaData = $pdf->getDetails();

    echo json_encode(array($metaData));
}
