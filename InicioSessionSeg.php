<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
   echo"<script>alert('Esta pagina es solo para usuarios registrados')</script>";
   echo"<script  language='javascript'>window.location='login.php'</script>";  
   exit;
}
$now = time();
if($now > $_SESSION['expire']) {
   session_destroy();
   echo"<script>alert('Su sesion ha expirado.')</script>";
   echo"<script  language='javascript'>window.location='login.php'</script>";  
   exit;
}
?>