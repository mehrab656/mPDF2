<?php


use Classes\Pdf;

require_once 'classes/Classes/Pdf.php';

$model = new Pdf('S',true,true);
$model->createPdf( 'demo1.php','Demo' );