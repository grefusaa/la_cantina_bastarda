<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <title>Menu</title>
</head>

<body>
    <?php 
    include("/header.php");
    ?>
    <div class="pag" style="display: flex;">
       
        <div>
            <h1>Administracio</h1>
        </div>
    </div>
    <div>
            <a href="/index.php"><button id="back-button" type="button"> Enrere</button></a>
    </div>

	<div>
            <a href="comandes.php"><button id="back-button" type="button"> Comandes</button></a>
    </div>
    

    
</body>


<?php
    include ("/footer.php");
    ?>
</html>