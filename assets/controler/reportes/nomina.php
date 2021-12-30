<?php
session_start();
require_once '../../vendor/dompdf/autoload.inc.php';

//$fecha_nomina = '2021-12-13';
//$empleado_nomina = '248';

$fecha_nomina = $_POST['form_fecha'];
$empleado_nomina = $_POST['form_empleado'];

$_SESSION['FechaNomina'] = $fecha_nomina;
$_SESSION['EmpleadoNomina'] = $empleado_nomina;

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);

ob_start();
include_once 'generarIndividual.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser

$dompdf->stream('document.pdf', array('Attachment' => 0));

session_unset($_SESSION['FechaNomina']);
session_unset($_SESSION['EmpleadoNomina']);
