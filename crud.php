<?php require_once "headerp.php" ?>
<fieldset>
<form action="crud.php" method="post" enctype="multipart/form-data">
	<br>
	<br>
	<table border="1">
						<thead>
				<th colspan="2" style="color:white; background: blue;">REGIONAL ATLANTICO</th>

		</thead>	
			
		<tbody>

			<tr>
				<td><label>NOMBRE DEL CENTRO</label></td>
				<td><input type="text" name="nombre"  required></td>
			</tr>
			<tr>
				<td><label>DIRECCION</label></td>
				<td><input type="text" name="direccion"  required></td>
			</tr>
			<tr>
				<td><label>CIUDAD</label></td>
				<td><input type="text" name="ciudad"  required></td>

			</tr>
			<tr>
				<td><label>TELEFONO</label></td>
				<td><input type="number" name="telefono"  required></td>

			</tr>
			<tr>
				<td><label>BARRIO</label></td>
				<td><input type="text" name="barrio"  required></td>

			</tr>
			<tr>
				<td><label>FOTO</label></td>
				<td><input type="file" name="foto" required ></td>

			</tr>
		</tbody>
				<tfoot>
					<td colspan="2"><input type="submit" name ="aceptar" value="GUARDAR DATOS" ></td>
				</tfoot>
		</table>
	

</form>
</fieldset>
<?php
if (isset($_REQUEST['aceptar'])) {
	require_once"conexion_mysql.php";
	extract($_REQUEST);
	$fecha =date("Y-m-d");
	$caracteres ="0123456789abcdefghijklmnopqrstuvwxyz";
	$ruta ="fotos/";
	$nombre_foto =$_FILES["foto"]["name"];
	$nombre_tmp = $_FILES["foto"]["tmp_name"];
	$n= substr(str_shuffle($caracteres),0,6);
		if(move_uploaded_file($nombre_tmp,$ruta.$n."".$nombre_foto)){
			$query="INSERT INTO t_sedes
			(SED_NOMBRE,SED_DIRECCION,SED_CIUDAD,SED_TELEFONO,SED_BARRIO,SED_FOTO)
			VALUES 
			('$nombre', '$direccion', '$ciudad',$telefono,'$barrio','$nombre_foto')";
			$r=mysqli_query($con,$query) ;
				if(mysqli_affected_rows($con) == 1){
				echo "<br />REGISTRO INSERTADO<br />";
		}
	}else{
		"ERROR AL SUBIR"; 
	}
}
?>
<?php require_once "footer.php";?>
