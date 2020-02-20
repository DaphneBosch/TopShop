<?php
/**
 * Created by PhpStorm.
 * User: Daphne
 * Date: 11/13/2019
 * Time: 16:41
 */

ob_clean();
ob_start();

include_once('../db/dbconfig.php');

$rapportName = "../pages/" . $_GET['rapportName'];
include $rapportName . ".php";
$rapport = ob_get_clean();
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($rapport);
$mpdf->Output();