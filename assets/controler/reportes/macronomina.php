<?php 
session_start();
require_once '../../vendor/dompdf/autoload.inc.php';

//$fecha_nomina = $_POST['fromRepList'];
$fecha_nomina = '2021-02-12';

$_SESSION['FechaNomina'] = $fecha_nomina;

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);
ob_start();
  include_once 'generarNomina.php';
  $html=ob_get_clean();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser

$dompdf->stream('document.pdf',array('Attachment'=>0));

session_unset($_SESSION['FechaNomina']);

?>