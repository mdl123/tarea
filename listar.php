<!DOCTYPE HTML>
<html>	
	<head>
	<link rel="stylesheet" type="text/css" href="main.css">
	<?php 

$error=0;
$msg="";
$aproved=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST["id"])) {
$error++;
}//fin del if
else{
	if(is_numeric($_POST["id"])==false){
		
		$msg.="El campo id solo puede tener numeros";
		$aproved=0;
	}//fin del if
}//fin del else
if(empty($_POST["nombre"])) {
$error++;
}//fin del if
if(empty($_POST["apellido"])) {
$error++;
}//fin del if
if(empty($_POST["genero"])) {
$error++;
}//fin del if
if(empty($_POST["fecha_nac"])) {
$error++;
}//fin del if

else{

if (strpos($_POST["fecha_contra"],'/') == false) {
    $msg.="El campo fecha de contratación tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
$arr=explode("/",$_POST["fecha_contra"]);
if(sizeof($arr)!=3){
 $msg.="El campo fecha de contratación tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
	
	for($x=0;$x<count($arr);++$x) { 
	if(is_numeric($arr[$x])==false){		
 $msg.="El campo fecha de nacimiento tiene un formato invalido";
    $aproved=0;
	break;
	}//fin del if
	}//fin del for
}//fin del else
}//else of the slash


}//fin del else


if(empty($_POST["genero"])==false && $_POST["genero"]!='F' && $_POST["genero"]!='M'){
echo '<script type="text/javascript">alert("El campo genero solo puede contener la F o la letra M"); </script>';
$aproved=1;
}//fin del if

if(empty($_POST["fecha_contra"])) {
$error++;
}//fin del if



else{
$arr=explode("/",$_POST["fecha_contra"]);
if(sizeof($arr)!=3){
 $msg.="El campo fecha de contratación tiene un formato invalido";
    $aproved=0;
}//fin del if
else{
	
	for($x=0;$x<count($arr);++$x) { 
	if(is_numeric($arr[$x])==false){		
 $msg.="El campo fecha de nacimiento tiene un formato invalido";
    $aproved=0;
	break;
	}//fin del if
	}//fin del for
}//fin del else
}//else of the slash


}//fin del else


if($error==6) {
echo '<script type="text/javascript">alert("No todos los campos pueden estar vacios"); </script>';
}//fin del if

if($msg!=""){
echo '<script type="text/javascript">alert("' . $msg . '"); </script>';

}//fin del if

if($error!=6 && $aproved==1){
//establis connection
}//fin del if

 	




?>
	</head>
	<body>
	<h1>Listar Empleados</h1>
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
		<label>Fecha de contratación</label><input type="text" name="fecha_contra">
		<br>
		<label>Fecha de nacimiento</label><input type="text" name="fecha_nac">
		<br>
		<br>
		<input type="submit" value="Listar Empleado">
		</form>
		</section>
	</body>
</html>