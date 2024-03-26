<?php

// include autoloader
require '../vendor/autoload.php';


//echo 'teste bem sucedido!';

//Quick Start
// reference the Dompdf namespace
use Dompdf\Dompdf;
//use View\Resposta;


//$v = 'Meu primeiro pdf gerado por script';


// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('<html><h1>Tudo ok até aqui!</h1></html>');


ob_start();//tudo que está na linha abaixo será capturado em ob_get_clean()
require __DIR__.'/resposta.php';
$pdfView = ob_get_clean();//sem buffer de saída(renderização html)
//echo $pdfView;
$dompdf->loadHtml($pdfView);//apenas carrega (salva/equivalência) mas n nem imprime

//die();

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('nome_padrão_para_download_opcional.pdf', ['Attachment' => true]);//attachment força o download.

