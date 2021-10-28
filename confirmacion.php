<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmacion</title>
        <link rel="stylesheet" type="text/css" href="/css/confirmación.css"/>
    </head>
    <body>
        <div>
            <header>
                <?php
                include "header.php";
                ?>
            </header>
            <?php
            session_start();
            echo  $_SESSION["pedido"] ;
            ?>
            <br>

            <br>
            <form action="index.php">
                <input type="submit" name="button" value="Inici">
            </form>

   	  <?php
  	  echo"<br>";
		if(isset($_COOKIE["comanda"])){
	    		echo"La cookie ya existe";
		}else{
	    		echo"Si no existe, la creamos";
	    		//Se crea cookie con duracion de
	    	setcookie("comanda", 54321); // time()+10,"/" esto cuando dejes de hacer pruebas lo pones de nuevo dentro del parentesis
		}
	?>
 
	<h1>Gracies per comprar</h1>
	<?php
	$nombreFichero="comanda.txt";
	$fh=fopen($nombreFichero,"a+") or die("Se produjo un error al crear el archivo");
	
	$texto = <<<_END
		\n
		Informacion del usuario:
		Nombre: $_POST[username]
		Telefono: $_POST[telefono]
		Correo: $_POST[correo]
		Comanda: $_SESSION[pedido] $_SESSION[precitot]
	_END;
	fwrite($fh, $texto);
	fclose($fh);

	session_destroy();
	?>



            <footer>
                <?php
                include "footer.php";
                ?>
            </footer>
        </div>
    </body>
</html>