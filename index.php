<?php
include 'players.php'
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
<body>

        <header class="header">
            <h1 class="header-title">Forjador de Partidas</h1>

            <p class="header-author">Aplicación creada por
                <a href="https://www.linkedin.com/in/alejandrotellezcorona/"
                   class="linkedin"
                   target="_blank">
                    @alextc35
                </a>
            </p>
        </header>

        <main class="app">
            <section class="add-players">
                <form action=""
                    method="POST"
                    class="formAddPlayers"
                    id="players-form">

                    <label for="addPlayer"
                        class="form-label">
                        Jugadores:
                    </label>

                    <input type="text" name="addPlayer" id="addPlayer"
                        placeholder="Introduce el nombre de un participante del torneo..."
                        maxlength="26"
                        required/>

                    <button type="submit" id="button-addPlayer" name="add">
                        Añadir
                    </button>
                </form>
            </section>

            <section class="view-players">
                <h1 class="h1-view">Participantes</h1>

                <hr class="view-separator">

                <div class="input-players">
                    <?php if (!empty($_SESSION['players'])) : ?>
                    <ul>
                        <?php foreach ($_SESSION['players'] as $index => $player): ?>
                            <li class="list-player">
                                <?= ($index + 1) . ". " . htmlspecialchars($player) ?>

                                <button id="editButton-<?= $index ?>" onclick="showEditForm(<?= $index ?>)" class="edit-player">
                                    <img src="./img/editar.png">
                                </button>

                                <form id="editForm-<?= $index ?>" action="" method="POST" style="display: none;" class="edit-player">
                                    <input type="hidden" name="playerIndex" value="<?= $index ?>">
                                    <input type="text" name="editPlayer" value="<?php echo htmlspecialchars($player) ?>" placeholder="Nuevo nombre" required>

                                    <button type="submit">
                                        Guardar
                                    </button>

                                    <button type="button" onclick="hideEditForm(<?= $index ?>)">
                                        Cancelar
                                    </button>
                                </form>

                                <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" name="playerIndex" value="<?= $index ?>">
                                    <button id="deleteButton-<?= $index ?>" type="submit" name="deletePlayer" class="delete-player"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar a este jugador?')">
                                        <img src="./img/eliminar.png">
                                    </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php else: ?>
                        <p>No hay jugadores añadidos aún.</p>
                    <?php endif; ?>
                </div>

                <form action="" method="POST" class="form-players">
                    <button type="submit" name="resetPlayers" id="button-resetPlayers">
                        Limpiar
                    </button>
                </form>

                <form action="match.php" method="POST" class="form-players">
                    <button type="submit" name="matchPlayers" id="button-matchPlayers">
                        Enfrentar
                    </button>
                </form>
            </section>
        </main>

        <footer class="footer">
            <p>&copy; <?=date('Y')?> | 
                <a href="https://github.com/Alextc35/chess-tournament/blob/main/LICENSE" class="license" target="_blank">
                    Licencia MIT
                </a>
            </p>

            <p>
                <a href="https://github.com/Alextc35/chess-tournament" class="version" target="_blank">
                    v. 0.1.0
                </a>
            </p>
        </footer>
</body>
</html>