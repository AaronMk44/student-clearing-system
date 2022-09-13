<?php

require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->writeHTML('<h1>Testing</h1>');
$mpdf->Output('Clearance Form.pdf', 'D');
