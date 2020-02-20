<?php

session_start();
include_once('../db/dbconfig.php');
include_once('../php/header.php');

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'login';
}

if ($page) {
  include('../pages/' . $page . '.php');
}

 ?>
