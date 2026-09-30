<?php

include("../conect.php");

class producto
{
	private $id_producto;
	private $nombre;
	private $descripcion;
	private $precio;

	public function __construct($nombre = "", $descripcion = "", $precio = "")
	{
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
	}

	public function introducir_producto()
	{
		global $conexion;

		$sentencia = mysqli_prepare($conexion, 'INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)');
		mysqli_stmt_bind_param($sentencia, 'ssd', $this->nombre, $this->descripcion, $this->precio);
		mysqli_stmt_execute($sentencia);
		mysqli_stmt_close($sentencia);

	}

	public function eliminar_producto($id_producto)
	{
		global $conexion;

		$id_producto = (int) $id_producto;
		mysqli_query($conexion, "DELETE FROM productos WHERE id_producto = $id_producto");
	}

	public function listar_producto()
	{
		global $conexion;

		$resultado = mysqli_query($conexion, "SELECT * FROM productos");

		while ($fila = mysqli_fetch_array($resultado)) {
			echo "<div class='producto-card'>";
			echo "<h3>Nombre: " . htmlspecialchars($fila['nombre']) . "</h3>";
			echo "<p>Descripción: " . htmlspecialchars($fila['descripcion']) . "</p>";
			echo "<strong>Precio: $" . htmlspecialchars($fila['precio']) . "</strong>";
			echo "<a class='boton-eliminar' href='unidad7.php?eliminar=" . $fila['id_producto'] . "'>Eliminar</a>";
			echo "</div>";
		}
	}
}

?>