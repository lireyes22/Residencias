<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Residencias</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="login_form_container">
      <div class="login_form">
        <h2>Residencias</h2>
        <form action="procesarLogin.php" method="POST">
          <div class="input_group">
          <i class="fa fa-user"></i>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
            class="input_text"
            autocomplete="on"
          />
        </div>
        <div class="input_group">
          <i class="fa fa-unlock-alt"></i>
          <input
            type="password"            
            id="password"
            name="password"
            placeholder="Password"
            class="input_text"
            autocomplete="on"
          />
        </div>
        <div class="combo in">
          <select class="combo-select custom-select" name="rol">
              <option value="Alumno">Alumno</option>
              <option value="Profesor">Profesor</option>
              <option value="JefDept">Jefe de departamento Academico</option>
              <option value="AsesorInterno">Asesor Interno</option>
              <option value="AsesorExterno">Asesor Externo</option>
          </select>
        </div>

        <div class="button_group" id="login_button">
		  <button type="submit" value="Enviar">Ingresar</button>
		</div>          
        </form>
        
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>