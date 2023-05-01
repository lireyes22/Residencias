<?php
if (file_exists('funciones.php')) {
	include 'funciones.php';
	echo "LLego bien";
}else{
	echo"<script>alert('Servidor Fuera de Linea')</script>";
 echo"<script  language='javascript'>window.location='login.php'</script>"; 
}
?>