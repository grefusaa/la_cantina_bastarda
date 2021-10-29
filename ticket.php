<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIQUET</title>
    <link rel="stylesheet" type="text/css" href="/css/ticket.css"/>
</head>
    <body>
        <header>
            <?php
            include "header.php";
            ?>
        </header>
        <div id="flex_ticket">
            <div id="ticket">
                <h1>Validacion de compra</h1>
                <?php

                $menu = file_get_contents('productos.json');

                $menu_json = json_decode($menu,true);
		
                $Preu_total = 0;
                foreach ($_POST as $id => $value){

                        if($value!=0 && $id!="json"){
                            echo "Nombre de producto: ".$menu_json[$id]["nombre"].
                                "<br>".
                                "Unitats: ".$value.
                                "<br>".
                                "Preu unitari: ".$menu_json[$id]["precio"]."€".
                                "<br>".
                                "Preu total: ".$menu_json[$id]["precio"]*$value."€".
                                "<br><br>";
                                $Preu_total+=$menu_json[$id]["precio"]*$value;
                        }
                    }
                    "<br><br>";
                    echo "Preu Total de los productos: ".$Preu_total."€";


                    $texto_pedido="";
                    foreach ($_POST as $id => $value){

                        if($value!=0 && $id!="json"){
                            $texto_pedido .= "Nombre de producto: ".$menu_json[$id]["nombre"]."-----".
                                "Unitats: ".$value.
                                "  ----  ".
                                "Preu unitari: ".$menu_json[$id]["precio"]."€".
                                "  ==> ".
                                "Preu total: ".$menu_json[$id]["precio"]*$value."€".
				"                      ";
                             
                                $Preu_total=$menu_json[$id]["precio"]."€";
				
                        }
                    }

                  



                    session_start();
                    $_SESSION["pedido"] = $texto_pedido;

                ?>
            </div>
            <div>
                <div class="main">
                    <h1>Validació d'usuari</h1>
                    <center>
                        <form action="confirmacion.php" method="POST">
                            <fieldset>
                                <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                                <div>
                                    <label for="name">Nom</label>
                                    <input name="username" type="text" id="username" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="tel">Telèfon</label>
                                    <input type="tel" id="tel" name="telefono" value="">
                                    <span class="error">*</span>
                                </div>
                                <div>
                                    <label for="email">Correu electrònic</label>
                                    <input type="email" id="correo" name="correo" value="">
                                    <span class="error">*</span>
                                </div>
                            </fieldset>
                            <button type="submit" id="comprar" value="Sumbit">Comprar</button>
                            <button type="reset" name="sumbit" value="Inicialitza">Borrar</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        <script>
            window.onload = function(){
                document.getElementById("username").focus();
            }
            document.getElementById("comprar").addEventListener("click",function (e){
                function comprovarNom(){
                    if(document.getElementById("username").value == ""){
                       return 1;
                    }
                    else if(!( /^[A-Za-zƒŠŒŽšœžŸÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/.exec(document.getElementById("username").value))) {
                        return 2;
                    }
                }
                function comprovarTele() {
                    if (document.getElementById("tel").value == "") {
                        return 1;
                    } else if (!(/^[0-9]+$/.exec(document.getElementById("tel").value))) {
                        return 2;
                    } else if (document.getElementById("tel").value.length!= 9)
                        return 3;
                }

                function comproEmail() {
                    if (document.getElementById("correo").value == "") {
                        return 1;
                    } else if (!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(document.getElementById("correo").value))) {
                        return 2;
                    }
                }

                if(comprovarNom() == 1){
                    alert("Introduir un nom");
                    e.preventDefault();
                }
                else if(comprovarNom() == 2){
                    alert("Solo palabras");
                    e.preventDefault();
                }
                if(comprovarTele() == 1){
                    alert("Introduce un numero");
                    e.preventDefault();
                }
                else if(comprovarTele() == 2){
                    alert("El teléfono debe ser una frase numérica");
                    e.preventDefault();
                }
                else if(comprovarTele() == 3){
                    alert("El numero debe contener nueve digitos");
                    e.preventDefault();
                }
                if(comproEmail() == 1){
                    alert("Tienes que escribir un correo");
                    e.preventDefault();
                }
                else if(comproEmail() == 2){
                    alert("Tiene que ser el correo del institut Pedralbes");
                    e.preventDefault();
                }
            });
        </script>
        <input type="button" value="Página anterior" onClick="history.go(-1);">
        <footer>
            <?php
                include 'footer.php'
            ?>
        </footer>
    </body>
</html>