<?php
include 'players.php';
$version = "0.5.1";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descubre nuestra aplicación web para generar emparejamientos de manera rápida y sencilla. Ideal para torneos, sorteos, actividades grupales y más. ¡Organiza y conecta a las personas fácilmente!">
    <title>Forjador de partidas</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body class="no-margin-no-padding">
    <header class="main-header">
        <h1 class="header-title">Forjador de Partidas</h1>
        <p>Aplicación creada por <a href="https://www.linkedin.com/in/alejandrotellezcorona/"  class="link-linkedin"  target="_blank">@alextc35</a></p>
    </header>

    <main class="app column-content">
        <section class="add-players">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="addPlayer" class="center-content"> Jugadores:</label>
                <input type="text" name="addPlayer" id="addPlayer" placeholder="Introduce un nombre..." maxlength="26" required/>
                <button type="submit" name="add" class="submit-button add-button">Añadir</button>
            </form>
        </section>

        <section class="view-players column-content">
            <h1 class="center-content">Participantes</h1>
            <hr>
            <section class="center-content">
                <?php if (!empty($_SESSION['players'])) : ?>
                    <ul class="no-margin-no-padding">
                        <?php foreach ($_SESSION['players'] as $index => $player): ?>
                            <li class="list-player"><?= ($index + 1) . ". " . htmlspecialchars($player) ?>
                                <button id="editButton-<?= $index ?>" class="edit-player" onclick="showEditForm(<?= $index ?>)"><img src="./img/editar.png" class="list-player-img" alt="Editar"></button>
                                <form id="editForm-<?= $index ?>" class="edit-player-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display: none;">
                                    <input type="hidden" name="playerIndex" value="<?= $index ?>"> <!-- Input auxiliar -->
                                    <label for="editPlayer-<?= $index ?>">Renombrar:</label>
                                    <input type="text" name="editPlayer" id="editPlayer-<?= $index ?>" onclick="attachFocusSelectToInput(<?= $index ?>)" value="<?php echo htmlspecialchars($player) ?>" placeholder="Nuevo nombre..." maxlength="26" required>
                                    <section class="edit-list-player">
                                        <button type="submit" class="submit-button edit-list-button" >Guardar</button>
                                        <button type="button" class="submit-button edit-list-button"  onclick="hideEditForm(<?= $index ?>)">Cancelar</button>
                                    </section>
                                </form>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="display: inline;">
                                    <input type="hidden" name="playerIndex" value="<?= $index ?>">
                                    <button id="deleteButton-<?= $index ?>" type="submit" name="deletePlayer" class="delete-player" onclick="return confirm('¿Estás seguro de que quieres eliminar a \'<?php echo htmlspecialchars($player) ?>\'?')"><img src="./img/eliminar.png" class="list-player-img" alt="Eliminar"></button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No hay jugadores añadidos aún.</p>
                <?php endif; ?>
            </section>

            <section class="button-container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <button type="submit" name="resetPlayers" class="submit-button reset-button">Limpiar</button>
                </form>

                <form action="match.php" method="POST">
                    <button type="submit" name="matchPlayers" class="submit-button match-button">Enfrentar</button>
                </form>
            </section>
        </section>
    </main>

    <footer class="column-content">
        <p>&copy; <?=date('Y')?> |<a href="https://github.com/Alextc35/match-forge/blob/main/LICENSE" class="footer-license" target="_blank">Licencia MIT</a></p>
        <p><a href="https://github.com/Alextc35/match-forge" class="footer-version" target="_blank">v. <?= $version ?></a></p>
    </footer>
</body>
</html>