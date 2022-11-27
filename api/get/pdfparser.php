<?php
require '../../libs/autoload.php';
$config = new \Smalot\PdfParser\Config();
$config->setFontSpaceLimit(-50);

$parser  = new \Smalot\PdfParser\Parser([], $config);
// $filename = $_POST['filename'];
$file  = "C:/Users/Mikel/Downloads/07_CPURJ_ConcepcionEL_1999.pdf";

$pdf = $parser->parseFile($file);

$metaData = $pdf -> getDetails();

foreach ($metaData as $data => $value) {
    if(is_array($value)) {
        $value = implode(',', $value);
    }
    echo $data . '=>' .$value . "\n"; 
}





// // $test = preg_replace("/INTRODUCTION([\s\S]*)$/im", ' ', $text);
// // $abstract = preg_replace("/[\s\S]*?(?<=ABSTRACT)/i", ' ', $test);

// // $regular_spaces = $abstract;

// // echo $regular_spaces;

// // // Open a webpage
//  $homepage = file_get_contents('http://127.0.0.1/urc/api/get/pdfparser.php'); // echo the homepage to see the content.
//  echo $homepage;

//  // Set the filename
//  $file = 'hp.txt'; 
//  //Write the contents back to the file
//  file_put_contents($file, $homepage);
