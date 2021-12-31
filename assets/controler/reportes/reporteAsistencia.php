<?php 

require_once '../../vendor/dompdf/autoload.inc.php';

$form_empleado = $_POST['form_empleado'];
$form_fecha_in = $_POST['form_fecha_in'];
$form_fecha_out = $_POST['form_fecha_out'];

$_SESSION['form_empleado'] = $form_empleado;
$_SESSION['form_fecha_in'] = $form_fecha_in;
$_SESSION['form_fecha_out'] = $form_fecha_out;

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);

  ob_start();
  include_once 'generarAsistencia.php';
  $html=ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Letter', 'portail');

// Render the HTML as PDF
$dompdf->render();

// add the header
$canvas = $dompdf->get_canvas();
$footer = $canvas->open_object();

    $canvas->page_text(560, 760, "{PAGE_NUM} de {PAGE_COUNT}",
    "helvetica", 10, array(0,0,0));

$canvas->close_object();
$canvas->add_object($footer, "all");

// Output the generated PDF to Browser

$dompdf->stream("Lista Asistencia  ".date('Y-m-d', strtotime("now")),array('Attachment'=>0));


session_unset($_SESSION['form_empleado']);
session_unset($_SESSION['form_fecha_in']);
session_unset($_SESSION['form_fecha_out']);

?>

