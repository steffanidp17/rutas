<?php 
require_once "conexion_mysql.php";
$query="SELECT *FROM t_sedes";
$r=mysqli_query($con,$query) or trigger_error("Error:".mysqli_error($con));


echo "	<table border='1'>"; 
echo "<br/>";
	echo "<br/>";
	echo "<tr>";
	


while($datos =mysqli_fetch_array($r)){

	echo "<tr>";
	echo "<th>CENTRO </th>";
	echo "<td>".$datos['SED_NOMBRE']."</td>";
	echo "<tr>";
	echo "<th>DIRECCION</th>";
	echo "<td>".$datos['SED_DIRECCION']."</td>";
	echo "<tr>";
	echo "<th>CIUDAD </th>";
	echo "<td>".$datos['SED_CIUDAD']."</td>";
	echo "<tr>";
	echo "<th>TELEFONO </th>";
	echo "<td>".$datos['SED_TELEFONO']."</td>";
	echo "<tr>";
	echo "<th>BARRIO </th>";
	echo "<td>".$datos['SED_BARRIO']."</td>";
	echo "<tr>";
	echo "<td>
	<a href='listar.php?id=".$datos['SED_ID']."'>EDITAR</a></td>";
	echo "<td>
	<a href='listar.php?id=".$datos['SED_ID']."'>ELIMINAR</a></td>";
	echo "<tr>";
	echo "<td><br/></td>";
	echo "<td><br/></td>";
	echo "<tr>";



}
echo"</table>";

?>