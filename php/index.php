<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INDEX</title>
        <link rel='stylesheet' type='text/css' href='/css/index.css'/>
    </head>
    <body>
        <div>
            <div>
                <header>
                    <?php
                    include 'header.php';
                    ?>
                </header>
                <hr>
            </div>
            <div class="menuButton">
                      <form action="menu.php">
                          <input type="submit" name="menu.php" value="menu" id="button">
                      </form>
<div>
<a href="Administracio.php">Admin</a>
</div>

            </div>
            <hr>
            <div class="container">
              <img class="cantinaImag" src="/imagenes/cantina.jpg">
                <div class="overlay">
                <div class="text">"Benvinguts a la cantina"</div>
                </div>
            </div>
                <footer>
                    <?php
                        include 'footer.php'
                    ?>
                </footer>
            </div>

        </div>
    </body>
</html>
