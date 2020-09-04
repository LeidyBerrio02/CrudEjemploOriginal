<?php 
require_once '../controller/user_controller.php';
$control = new User_Controller();
if ($control->eliminar($_GET['id'])) {
	echo "Datos eliminandos con exito  "; ?>
	<meta http-equiv="refresh" content="0; url=../index.php">
<?php  }?>
