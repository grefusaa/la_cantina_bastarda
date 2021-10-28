<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <link rel='stylesheet' type='text/css' href='/css/menu.css'/>
    </head>
    <body>
        <div>
            <header>
                    <?php
                        include 'header.php';
                    ?>
            </header>
            </div>
            <br><br>
                <form method="POST" action="ticket.php" id="formulari">
                    <div class="grid-container">
                        <?php
                            $menu = file_get_contents('productos.json');

                            $menu_json = json_decode($menu,true);

                            foreach ($menu_json as $key => $value){
                                $id = $menu_json[$key]["id"];
                                $pro = $menu_json[$key]["nombre"];
                                $pre = $menu_json[$key]["precio"];
                                $ruta = $menu_json[$key]["ruta"];
                                echo "<div id=$id class='grid-element'>";
                                    echo "<p><b> $pro </b></p> 
                                          <br> $pre € 
                                          <br><br>
                                          <div class='foto'>
                                             <img class='productes' src=$ruta>
                                          </div>
                                          <input type='button' class='treure' value='-'>
                                          <input name='$id' class='cantidades' type='text' id='p$id' value='0'>
                                          <input type='button' class='afegir' value='+'>
                                          <br><br>";
                                echo "</div>";
                            }

                            echo "<input id='json' name='json' type='hidden' value='".$menu."'>";
                        ?>
                        <div id="ticket"></div>
                        <input type="submit" value="Comprar">
                    </div>
                </form>

        <script>
        function actualizarTicket(datosMenu){
            console.log(datosMenu);

            let ticket=document.getElementById("ticket");

            cantidades = document.getElementsByClassName("cantidades");
            let textTicket="";
            let Preu_total=0;
            for(let index = 0;index < cantidades.length;index++){
                if(cantidades[index].value!=0){
                   textTicket += " Article: " + datosMenu[cantidades[index].parentNode.id].nombre;
                   textTicket += "<br>";
                   textTicket += " Unitats: " + cantidades[index].value;
                   textTicket += "<br>";
                   textTicket +="   Preu unitari: " + datosMenu[cantidades[index].parentNode.id].precio +"€";
                   textTicket += "<br>";
                   textTicket +="   Preu total:   " + datosMenu[cantidades[index].parentNode.id].precio * cantidades[index].value +"€";
                   Preu_total +=  datosMenu[cantidades[index].parentNode.id].precio * cantidades[index].value;
                   textTicket += "<br><br>";
                }
            }
            "<br><br>";
            textTicket+="<h2>   Preu total de todos los productos:   " +  Preu_total + "€</h2>";

            ticket.innerHTML = textTicket;
        }


        let gallery = document.getElementById("formulari");
        menuList = JSON.parse(document.getElementById("json").value);
        let pre = 0;
        gallery.addEventListener("click", e => {
            if (e.target.classList.contains("afegir")) {
                id = e.target.parentNode.id;
                document.getElementById("p" + id).value++;
                actualizarTicket(menuList);
            }

            else if (e.target.classList.contains("treure")) {
                id = e.target.parentNode.id;
                if (document.getElementById("p"+id).value > 0) {
                    document.getElementById("p"+id).value--;
                }

                actualizarTicket(menuList);
            }
        });
        </script>
        <footer>
            <?php

                include 'footer.php';

            ?>

        </footer>
	<script src="/js/horaDia.js"></script>
    </body>
</html>

