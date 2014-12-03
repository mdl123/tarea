<!DOCTYPE HTML>
<html>	
	<head>
	<link rel="stylesheet" type="text/css" href="main.css">
	<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$error="";

if(empty($_POST["nombre"])) {
$error="El campo nombre no puede estar vacio";
}//fin del if
if(empty($_POST["apellido"])) {
$error="El campo apellido no puede estar vacio";
}//fin del if


if($error=="") {
//conectar a la base de datos
$con=mysqli_connect("localhost","root","password","employees");
$query = "SELECT * FROM employees";

}//fin del if
else {
echo '<script language="javascript">';
echo 'alert("Algun campo esta vacio")';
echo '</script>';

}//fin del else

}//fin del if
?>
	</head>
	<body>
	<h1>Agregar Empleado</h1>
		<section>
		<form method="POST"
 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		
		 <label>Nombre</label><input type="text" name="nombre">
		<br>
		<label>Apellido</label><input type="text" name="apellido">
		<br>
		<label>Sexo</label>
		<input type="radio" name="sex" value="M" checked>M
		<br>
		<input type="radio" name="sex" value="F">F
		<br>
		<label>Fecha de contratación</label><input type="date" name="fecha_contra">
		<br>
		<label>Fecha de nacimiento</label><input type="date" name="fecha_nac">
		<br>
		<input type="submit" value="Agregar Empleado">
		</form>
		</section>
	</body>
</html>