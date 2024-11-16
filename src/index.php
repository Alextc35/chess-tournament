<?php
session_start();

if (!isset($_SESSION['players'])) {
    $_SESSION['players'] = [];
}


if (isset($_POST['addPlayer']) && !empty($_POST['addPlayer'])) {
    $playerName = trim($_POST['addPlayer']);
    $_SESSION['players'][] = $playerName;
}

if (isset($_POST['editPlayer']) && isset($_POST['playerIndex']) && !empty($_POST['editPlayer'])) {
    $playerIndex = (int) $_POST['playerIndex'];
    $newName = trim($_POST['editPlayer']);
    if (isset($_SESSION['players'][$playerIndex])) {
        $_SESSION['players'][$playerIndex] = $newName;
    }
}

if (isset($_POST['deletePlayer']) && isset($_POST['playerIndex'])) {
    $playerIndex = (int) $_POST['playerIndex'];
    if (isset($_SESSION['players'][$playerIndex])) {
        unset($_SESSION['players'][$playerIndex]);
        $_SESSION['players'] = array_values($_SESSION['players']);
    }
}

if (isset($_POST['resetPlayers'])) {
    $_SESSION['players'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Organiza torneos de ajedrez de manera rápida y sencilla con nuestra aplicación web. Genera emparejamientos aleatorios, gestiona participantes y disfruta de un torneo equilibrado en cuestión de segundos. ¡Ideal para clubes y eventos casuales!">
    <title>Torneo de Ajedrez</title>
    <link rel="stylesheet" href="style.css">
    <script>

        function showEditForm(index) {
            const form = document.getElementById('editForm-' + index);
            form.style.display = 'block';
        }

        function hideEditForm(index) {
            const form = document.getElementById('editForm-' + index);
            form.style.display = 'none';
        }
    </script>
</head>
<body>

    <div class="aplicacion">
        <header class="header">
            <h1 class="header-title">Torneo de Ajedrez</h1>

            <p class="header-author">Aplicación creada por
                <a href="https://www.linkedin.com/in/alejandrotellezcorona/"
                   class="linkedin"
                   target="_blank">
                    @alextc35
                </a>
            </p>
        </header>

        <section class="add-players">
            <form action="" method="POST" class="formAddPlayers" id="players-form">
                <label for="addPlayer" class="form-label">Jugadores:</label>
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
                        <li class="view-player">
                            <?= ($index + 1) . ". " . htmlspecialchars($player) ?>

                            <button onclick="showEditForm(<?= $index ?>)">Editar</button>

                            <form id="editForm-<?= $index ?>" action="" method="POST" style="display: none;">
                                <input type="hidden" name="playerIndex" value="<?= $index ?>">
                                <input type="text" name="editPlayer" placeholder="Nuevo nombre" required>
                                <button type="submit">Guardar</button>
                                <button type="button" onclick="hideEditForm(<?= $index ?>)">Cancelar</button>
                            </form>
                            <form action="" method="POST" style="display: inline;">
                                <input type="hidden" name="playerIndex" value="<?= $index ?>">
                                <button type="submit" name="deletePlayer" onclick="return confirm('¿Estás seguro de que quieres eliminar a este jugador?')">Eliminar</button>
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
                    Borrar
                </button>

                <button type="submit" name="matchPlayers" id="button-matchPlayers">
                    Enfrentar
                </button>
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