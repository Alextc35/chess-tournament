<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo de Ajedrez</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="aplicacion">

        <header class="header">
            <h1 class="header-title">Torneo de Ajedrez</h1>
            <p class="header-author">Aplicación creada por
                <a href="https://www.linkedin.com/in/alejandrotellezcorona/" class="linkedin" target="_blank">
                    @alextc35
                </a>
            </p>
        </header>

        <section class="add-players">
            <form action="" method="POST" class="form" id="players-form">
                <label for="addPlayer" class="form-label">Jugadores:</label>
                <input type="text" name="addPlayer" id="addPlayer" placeholder="Introduce el nombre de un participante del torneo..."/>
                <button type="submit" id="button-addPlayer">Añadir</button>
            </form>
        </section>

        <section class="view-players">
            <form action="" method="post" class="form-players">
                <h1 class="h1-view">Participantes</h1>
                <div class="players">
                    <input type="text" class="view-name" value="Alejandro Téllez Corona" disabled/>
                    <input type="text" class="view-name" value="Daniel Ramos Estebán" disabled/>
                </div>
                <button type="submit" id="button-matchPlayer">Enfrentar</button>
            </form>
        </section>

        <footer class="footer">
            <p>&copy; <?=date('Y')?> | 
                <a href="https://github.com/Alextc35/chess-tournament/blob/main/LICENSE" class="license" target="_blank"> Licencia MIT</a>
            </p>
            <p>
                <a href="https://github.com/Alextc35/chess-tournament" class="version" target="_blank">v. 0.0.1</a>
            </p>
        </footer>

    </div>
</body>
</html>