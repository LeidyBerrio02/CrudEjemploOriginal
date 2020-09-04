<?php 
require_once '../controller/user_controller.php';
require_once '../model/user_model.php';
$usuario = new Usuario();
$control = new User_Controller();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<title>mc2 registrar</title>
</head>
<body>
<div class="container">
<a href="../index.php" class="btn btn-primary" role="button" style="font-family: 'Gill Sans','Gill Sans MT',sans-serif">home</a><br>

<center>

<h3>ingresar al  registro</h3>
<form action="#" method="post">
	<label>nombre:</label>
	<input type="text"  class="form-control" name="nombre" placeholder="nombre" required>  <br>
		<label>edad:</label>
	<input type="text" class="form-control"  name="edad" placeholder="edad" required>  <br>
		<label>email:</label>
	<input type="text"  class="form-control" name="email" placeholder="email" required>  <br>
	<input type="submit" name="enviar" class="btn btn-primary" value="enviar">
</form>
<?php 
if (isset($_POST['enviar'])) {
	$usuario->__SET('nombre',$_POST['nombre']);
	$usuario->__SET('edad',$_POST['edad']);
	$usuario->__SET('email',$_POST['email']);
	if ($control->insertar($usuario)) {
		echo "datos  ingresados con exito";
		?>
		<meta http-equiv="refresh" content="0; url=../index.php">
<?php 
	}
}else{
echo "Error al ingresar los Datos";
} ?>

</center>
 </div>
	<script type="../../bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="../../bootstrap-3.3.7/js/jquery-3.3.1.min.js"></script>
</body>
</html>