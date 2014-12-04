<!DOCTYPE HTML>
<html>	
	<head>
	<link rel="stylesheet" type="text/css" href="main.css">
	<?php 

$msg="";
$aproved=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$error="";
if(empty($_POST["id"])) {
$msg.="El campo id no puede estar vacio";
$aproved=0;
}//fin del if
else{
	if(is_numeric($_POST["id"])==false){
		
		$msg.="El campo id solo puede tener letras";
		$aproved=0;
	}//fin del if
}//fin del else
if(empty($_POST["nombre"])) {
$msg.="El campo nombre no puede estar vacio";
$aproved=0;
}//fin del if
if(empty($_POST["apellido"])) {
$msg.="El campo apellido no puede estar vacio";
$aproved=0;
}//fin del if
if(empty($_POST["genero"])) {
$msg.="El campo genero no puede estar vacio";
$aproved=0;
}//fin del if
$tmp=$_POST["genero"];
if(empty($tmp)==false&&($tmp!='F'&&$tmp!='M')){
$msg.="El campo genero solo puede tener contenr el caracter F o M ";
$aproved=0;
}//fin del if

if(empty($_POST["fecha_nac"])) {
$msg.="El campo fecha de nacimiento no puede estar vacio";
$aproved=0;
}//fin del if
else{

if (strpos($_POST["fecha_nac"],'/') == false) {
    $msg.="El campo fecha de nacimiento no tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
$arr=explode("/",$_POST["fecha_nac"]);
if(sizeof($arr)!=3){
 $msg.="El campo fecha de nacimiento no tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
	
	for($x=0;$x<count($arr);++$x) { 
	if(is_numeric($arr[$x])==false){		
 $msg.="El campo fecha de nacimiento no tiene un formato invalido";
    $aproved=0;
	break;
	}//fin del if
	}//fin del for
}//fin del else
}//else of the slash


}//fin del else

if(empty($_POST["fecha_contra"])) {
$msg.="El campo fecha de contratación no puede estar vacio";
$aproved=0;
}//fin del if
else{

if (strpos($_POST["fecha_contra"],'/') == false) {
    $msg.="El campo fecha de contratación no tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
$arr=explode("/",$_POST["fecha_contra"]);
if(sizeof($arr)!=3){
 $msg.="El campo fecha de contratación no tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
	
	for($x=0;$x<count($arr);++$x) { 
	if(is_numeric($arr[$x])==false){		
 $msg.="El campo fecha de contratación no tiene un formato invalido";
    $aproved=0;
	break;
	}//fin del if
	}//fin del for
}//fin del else
}//else of the slash


}//fin del else

if($msg!=""){
echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}
else{
//establish conection with database
}//fin del else
}
?>
	</head>
	<body>
	<h1>Agregar Empleados</h1>
		<section>
		<form method="POST"
 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		
		 <label>Id Empleado</label><input type="text" name="id">
		<br>
		 <label>Nombre</label><input type="text" name="nombre">
		<br>
		<label>Apellido</label><input type="text" name="apellido">
		<br>
		<label>Genero F/M</label><input type="text" name="genero">
		<br>
		<label>Fecha de contratación(yyyy/mm/dd)</label><input type="text" name="fecha_contra">
		<br>
		<label>Fecha de nacimiento(yyyy/mm/dd)</label><input type="text" name="fecha_nac">
		<br>
		<br>
		<input type="submit" value="Agregar Empleado">
		</form>
		</section>
	</body>
</html>