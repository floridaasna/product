<?php
use Dompdf\Domdf;
use Domdf\Options;
require_once 'modele/databases.php';
$sql = "SELECT * FROM 'product '";
$query = $db->query($sql);
$product  = $query->fetchAll();
ob_start();
require_once'views/listproduct.php';
$html = ob_get_contents();
ob_end_clean();
die($html);
require_once 'domdf/autoload.inc.php';
$option = new Option();
$option->set('defaultFont', 'courier');
$domdf = new Domdf();
$domdf->loadHTML('$html');
$domdf=setPaper('A4', 'portrait');
$domdf->render();
$domdf->stream;
?>
