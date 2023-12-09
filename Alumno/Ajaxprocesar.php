<?php
// Obtener el nombre del formulario
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Realizar alguna operación con el nombre (en este caso, simplemente devolverlo)
echo "Hola, $name. ¡Gracias por tu interés, te contactaremos lo más rápido posible a tu correo $email!";
?>
