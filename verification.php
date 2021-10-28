<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validació d'usuaris</title>
    <style>
        label {
            display: block;
            float: center;
            width: 200px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 20px;
        }
        input {
            display: block;
            margin-top: 10px;
            font-size: 20px;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
    </div>
    <div class="content">
        <div class="main">
            <h1>Validació d'usuari</h1>
            <center>
                <form action="/action_page.php" method="post" name="signup" id="signup">
                    <fieldset>
                        <legend>Introdueix les següents dades per verificar l'accés al menú</legend>
                        <div>
                            <label for="name" style="margin-top: 0px">Nom</label>
                            <input name="name" type="text" id="usurname" size="15">
                        </div>
                        <div>
                            <label for="tel">Telèfon</label>
                            <input type="tel" id="tel" name="tel" maxlength="9" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" size="15">
                            <small>Format: 123456789</small>
                        </div>
                        <div>
                            <label for="email">Correu electrònic</label>
                            <input type="email" id="email" name="email" required>
                            <small>Format: a21exemple@inspedralbes.cat</small>
                        </div>
                    </fieldset>
                </form>
                <button type="submit" form="signup" value="submit">Enviar</button>
                <button type="reset" form="signup" value="reset">Borrar</button>
            </center>
        </div>
    </div>
</body>
</html>