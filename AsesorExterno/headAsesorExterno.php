<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Residencias</title>
	<link href="../recursos/css/Nefta.css" rel="stylesheet">
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/css/jquery.dataTables.min.css" rel="stylesheet"> 


</head>
<body> 
    <div class="container-fluid">
        <div id="principal" class="row text-white p-4 d-flex align-items-center justify-content-center text-center">
            <div id="boton" class="my-1 col-lg-1 ">

                    <button type="button" class="btn btn-transparent" data-bs-toggle="collapse" data-bs-target="#menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                              </svg>
                    </button>

            </div>
        
            <div id="titulo" class="col-lg-10">
                <h1>Asesor Externo</h1>
            </div>

            <div id="user" class="container my-1 col-lg-1">

                <div class="dropdown">
                    <button class="dropdown-toggle btn-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                        </svg>
                    </button>


                    <ul id="userMenu" class="dropdown-menu p-4">

                        <li class="row p-1">
                            <a class="dropdown-item d-flex centrarV" href="../logout.php">
                                <div class="col-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                    </svg>
                                </div>

                                <div class="col-9 centrarV">
                                    Log Out
                                </div>
                            </a>
                        </li>
                    </ul>
                  </div>
            </div>
        </div>


            <div id="contenedor" class="row">

                <div id="menu" class="collapse collapse-horizontal bg-white menu col-sm-12 col-md-3 col-lx-3 col-xxl-2">
                
                    <ul id="lista"  class="nav flex-column">
                        <li class="nav-item  p-3 row">
                            <h1>Menú</h1>
                        </li>
                        <li id="opcion" class="nav-item p-3  row">
                            <a href="IndexAE.php" class="d-flex">
                            <div class="col-3 centrar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" fill="#ccc" />
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#696969" stroke-width="20" stroke-dasharray="251.2" stroke-dashoffset="83.7" />
                                    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-size="25" fill="#000">%</text>
                                  </svg>
                            </div>
                
                            <div class="col-9 d-flex align-items-center">
                                    <span class="p-1">Alumnos</span>
                            </div>
                            </a>
                        </li>
                        <li id="opcion" class="nav-item p-3 row">
                            <a href="#" class="d-flex">
                            <div class="col-3 centrar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                    <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
                                  </svg>
                            </div>
            
                            <div class="col-9 d-flex align-items-center">
                                <span class="p-1">Otro</span>
                            </div>
                            </a>
                        </li>

                    </ul>  
                </div>