<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <title>Residencias</title>
    <link href="recursos/css/Nefta.css" rel="stylesheet">
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div id="principal" class="row text-white p-4 d-flex align-items-center justify-content-center text-center">
            <div id="boton" class="my-1 col-lg-1 ">

                <button type="button" class="btn btn-transparent" data-bs-toggle="collapse" data-bs-target="#menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-list"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>

            </div>

            <div id="titulo" class="col-lg-10">
                <h1>Asesor Interno</h1>
            </div>

            <div id="user" class="container my-1 col-lg-1">

                <div class="dropdown">
                    <button class="dropdown-toggle btn-transparent" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-people"
                            viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                    </button>


                    <ul class="dropdown-menu p-4">
                        <li class="row">
                            <h5>Roles</h5>
                        </li>
                        <li class="row"><a class="dropdown-item my-1" href="#">Profesor</a></li>
                        <li class="row"><a class="dropdown-item my-1" href="#">Departamento Academico</a></li>
                        <li class="row"><a class="dropdown-item my-1" href="#">Coordinador</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="row p-1">
                            <a class="dropdown-item d-flex centrar" href="../logout.php">
                                <div class="col-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                        <path fill-rule="evenodd"
                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg>
                                </div>

                                <div class="col-9 d-flex align-items-center">
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

                <ul id="lista" class="nav flex-column">
                    <li class="nav-item  p-3 row">
                        <h1>Menú</h1>
                    </li>
                    <li id="opcion" class="nav-item p-3  row">
                        <a href="AsesorInternoResidencias.php" class="d-flex">
                        <div class="col-3 centrar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-mortarboard" viewBox="0 0 16 16">
                                <path
                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                                <path
                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                            </svg>
                        </div>

                        <div class="col-9 d-flex align-items-center">
                            <span>Residencias</span>
                        </div>
                        </a>
                    </li>
                    <li id="opcion" class="nav-item p-3 row">
                        <a href="AsesorInternoAlumnos.php" class="d-flex">
                        <div class="col-3 centrar">
                            <svg fill="currentColor" width="30" height="30" viewBox="0 0 256 256" id="Flat"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M227.79492,52.61621l-96-32a11.98464,11.98464,0,0,0-7.58984,0L28.44678,52.53564l-.05078.01685-.19092.06372c-.17383.05786-.34107.12793-.51074.19312-.20118.07739-.40052.15722-.5962.24487-.24487.10962-.48706.22339-.72216.34814-.11817.06275-.23181.13233-.34766.199-.199.11426-.39526.23144-.58618.3562-.10938.07153-.21655.14551-.32361.2207q-.295.20655-.575.42993c-.09009.07154-.18091.14185-.26892.21607q-.33453.282-.64575.58691c-.04444.04346-.09192.0835-.13575.12744q-.37243.375-.70947.78077c-.06335.07592-.12109.15625-.18249.23364-.15516.1958-.30579.39453-.44837.59961-.07861.11279-.15332.22778-.228.34326q-.175.271-.33483.55127c-.07264.12671-.14551.25268-.21363.38257-.10583.20166-.20251.40844-.297.61645-.05225.115-.10987.22657-.15845.34351-.12842.30835-.24243.62353-.34522.94311-.04187.13086-.07544.2649-.113.39746-.06128.21656-.1189.43384-.16822.65455-.03125.14062-.05908.28222-.08545.4248-.04345.23462-.07861.47119-.10839.71-.01526.124-.03321.24732-.04468.37256C20.02209,63.2583,20,63.627,20,64v80a12,12,0,0,0,24,0V80.64868l23.7146,7.905a67.90093,67.90093,0,0,0,18.11377,84.73047,99.97006,99.97006,0,0,0-41.64819,36.16016,12.00007,12.00007,0,0,0,20.10351,13.10937,76.02217,76.02217,0,0,1,127.43213,0,12.00007,12.00007,0,0,0,20.10352-13.10937,99.97238,99.97238,0,0,0-41.64783-36.16016A67.9008,67.9008,0,0,0,188.2854,88.55371l39.50952-13.16992a11.99952,11.99952,0,0,0,0-22.76758ZM128,44.64941,186.05273,64l-20.70739,6.90234-.03272.011L128,83.35059,90.68677,70.91309l-.02844-.00953L69.94727,64ZM172,120A44,44,0,1,1,90.93738,96.29443l33.2677,11.08936a11.99358,11.99358,0,0,0,7.58984,0l33.2677-11.08936A43.87528,43.87528,0,0,1,172,120Z" />
                            </svg>
                        </div>
                        <div class="col-9 d-flex align-items-center">
                            <span>Alumnos</span>
                        </div>
                        </a>
                    </li>
                    <li id="opcion" class="nav-item p-3 row">
                        <a href="#" class="d-flex">
                        <div class="col-3 centrar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-text-paragraph" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5" />
                                <text x="10" y="15" font-size="5" fill="#000">RS</text>
                            </svg>

                        </div>

                        <div class="col-9 d-flex align-items-center">
                            <span>Reporte Semestral</span>
                        </div>
                        </a>
                    </li>
                    <li id="opcion" class="nav-item p-3 row">
                        <a href="#" class="d-flex">
                        <div class="col-3 centrar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chat-right-text" viewBox="0 0 16 16">
                                <path
                                    d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                                <path
                                    d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </div>
                        <div class="col-9 d-flex align-items-center">
                            <span>Asesorias</span>
                        </div>
                        </a>
                    </li>
                </ul>
            </div>