<?php 
    function encabezadox($titulo){
        echo '
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/StyleBase.css">
        <link rel="stylesheet" href="Style/StyleAsesor.css">
        <script src="procesos/intercDivs.js"></script>
        <title>Document</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="left-column">
                    <a class="home-btn" href="IndexAE.php">
                        <h2><span style="margin-right: 10px;">Asesor</span></h2>
                        <img src="img/asesor.png" width="50px">
                    </a>
                </div>
                <div class="center-column">
                    <h1>'.$titulo.'</h1>
                </div>
                <div class="right-column">
                    <a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
                </div>
            </div>
        </div>
        ';
    }
?>
