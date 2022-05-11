<?php


require '../../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

try {
    ob_start();
    require './resfec.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output();
} catch (Html2PdfException $e) {
    $html2pdf->clean('ex.pdf');

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>
