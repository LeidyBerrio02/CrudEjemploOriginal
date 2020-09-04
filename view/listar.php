<?php 
require_once "../controller/user_controller.php";
$control = new  User_Controller();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<title>CRUD mvc- Index</title>
	<!--<meta http-equiv="refresh" content="3; url=../index.php">-->
	<script type="text/javascript">
	function Confirmation() {
 
 if (confirm('Esta seguro de eliminar el registro?')==true) {
	 alert('El registro ha sido eliminado correctamente!!');
	 return true;
 }else{
	 alert('Cancelo la eliminacion');
	 return false;
 }
}
 </script>
</head>
<body>
	<a href="add.php" class="btn btn-primary" role="button" style="font-family: 'Gill Sans','Gill Sans MT',sans-serif">Agregar Nuevos Registros</a>

	<div class="container">
		<p style="font-family: 'Gill Sans MT',sans-serif ; font-size: 30px" >Consultar Personas</p>
		<div class="row">
			<div class="col-md-15 well">
					<div class="table-responsive">       
						<table class="table table-hover">
							<tr class="info">
								<td>NOMBRE</td>
								<td>EDAD</td>
								<td>EMAIL</td>
								<td>ACTUALIZAR</td>
							</tr>
							<tr>
								<?php foreach ($control->ListaDatos() as $r):?>
								<td> <?php echo $r->__GET('nombre'); ?> </td>
								<td> <?php echo $r->__GET('edad');?> </td>
								<td> <?php echo $r->__GET('email'); ?> </td>
								<th>
								
								<a href="../view/edit.php?id=<?php echo $r->id; ?>">
								<button type="submit">editar</button></a>
								<a href="../view/eliminar.php?id=<?php echo $r->id; ?>">	
								<button type="submit" onclick="return Confirmation()" >eliminar</button></a>
								</th>
								
								
							</tr>
							<?php endforeach; ?> 
						</table>
					</div>
			</div>
		</div>
		<script type="../../bootstrap-3.3.7/js/bootstrap.min.js"></script>
		<script type="../../bootstrap-3.3.7/js/jquery-3.3.1.min.js"></script>
	</body>
	</html>