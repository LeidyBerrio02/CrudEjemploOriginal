<?php 
include_once '../model/configuracion.php';
include_once '../model/user_model.php';
class User_Controller extends Conexion
{
	public function ListaDatos()
	{
		$datos=array();
		$consulta="SELECT * FROM usuario ORDER BY id ";
		try {
			$resultado=$this->conexion->prepare($consulta);
			$resultado->execute();
			foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
				$usuario = new Usuario();
				$usuario->__SET('id',$datos->id);
				$usuario->__SET('nombre',$datos->nombre);
				$usuario->__SET('edad',$datos->edad);
				$usuario->__SET('email',$datos->email);
				$dato[]=$usuario;
			}
			return $dato;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function insertar(Usuario $usuario)
	{
		$insertar="INSERT INTO usuario (nombre,edad,email) values (?,?,?)";
		try {
			$this->conexion->prepare($insertar)->execute(array(
				$usuario->__GET('nombre'),
				$usuario->__GET('edad'),
				$usuario->__GET('email')
				));

			return true;
		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
		}
	}
	public function buscar($id)
	{
		$buscar="SELECT * FROM usuario where id=?";
		try {
			$resultado=$this->conexion->prepare($buscar);
			$resultado->execute(array($id));
			$datos=$resultado->fetch(PDO::FETCH_OBJ);
			$usuario= new Usuario();
			$usuario->__SET('id',$datos->id);
			$usuario->__SET('nombre',$datos->nombre);
			$usuario->__SET('edad',$datos->edad);
			$usuario->__SET('email',$datos->email);
			return $usuario;
		} catch (Exception $e) {
			echo "error al buscar ".$e->getMessage();
		}
	}
	public function actualizar(Usuario $usuario)
	{
		$actualizar="UPDATE usuario SET nombre=?,edad=?,email=? where id=? ";
		try {
			$this->conexion->prepare($actualizar)->execute(array(
				$usuario->__GET('nombre'),
				$usuario->__GET('edad'),
				$usuario->__GET('email'),
				$usuario->__GET('id')

				));
			return true;

		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
		}
	}
	public function eliminar($id)
	{
		$borrar="DELETE  FROM usuario WHERE id=?";
		try {
			$this->conexion->prepare($borrar)->execute(array($id));
			return true;

		} catch (Exception $e) {
			echo "error al eliminar datos ".$e->getMessage();
		}
	}




















}



?>