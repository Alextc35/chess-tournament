<?php
include 'players.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Forjador de partidas</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <meta name="description" content="Descubre nuestra aplicación web para generar emparejamientos de manera rápida y sencilla. Ideal para torneos, sorteos, actividades grupales y más. ¡Organiza y conecta a las personas fácilmente!">
</head>
<body class="no-margin-no-padding">
    <?php include('header.php'); ?>

    <main class="app column-content">
        <section class="add-players">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="addPlayer" class="center-content"> Jugadores:</label>
                <input type="text" name="addPlayer" id="addPlayer" onfocus="this.select();" placeholder="Introduce un nombre..." maxlength="26" required/>
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
                            <li class="list-player center-content">
                                <span><?= ($index + 1) . ". " . htmlspecialchars($player) ?></span>
                                <button id="editButton-<?= $index ?>" class="edit-player" onclick="showEditForm(<?= $index ?>)"><img src="./img/editar.webp" class="list-player-img" alt="Editar"></button>
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
                                    <button id="deleteButton-<?= $index ?>" type="submit" name="deletePlayer" class="delete-player" onclick="return confirm('¿Estás seguro de que quieres eliminar a \'<?php echo htmlspecialchars($player) ?>\'?')"><img src="./img/eliminar.webp" class="list-player-img" alt="Eliminar"></button>
                                </form>
                            </li>
                            <hr class="separator">
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

    <?php include('footer.php'); ?>
</body>
</html>