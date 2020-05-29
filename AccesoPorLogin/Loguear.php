<?php
$host ="localhost";
$user ="root";
$pass ="";
$db='consultaprueba';
$conn=mysqli_connect($host,$user,$pass,$db)or die("Error al Conectar");
mysqli_select_db($conn,$db)or die("No de pudo conectar con la base de datos ERROR 404 NOT FOUND");

session_start();
$usuariologin=$_POST["usuario"];
$clavelogin= $_POST['clave'];

$sql = "select count(*) as contar from usuarios where usuario = '$usuariologin' and clave = '$clavelogin'";
$consulta = mysqli_query($conn, $sql);
$array = mysqli_fetch_array($consulta);


if ($array['contar']>0) {
    header("location: formulario.html");
}else{
    echo "Usuario o Clave incorrecto";
}






//Cierra la conexion a la base de datos
mysqli_close($conn);
?>