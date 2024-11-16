<?php
session_start();

if(!isset($_SESSION['players']) || empty($_SESSION['players'])) {
    header("Location: index.php");
    exit();
}

$players = $_SESSION['players'];
shuffle($players);

$matchups = [];
for ($i = 0; $i < count($players); $i += 2) {
    if (isset($players[$i + 1])) {
        $matchups[] = [$players[$i], $players[$i + 1]];
    } else {
        $matchups[] = [$players[$i], "Sin oponente"];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfrentamientos del Torneo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="aplicacion">
        <header class="header">
            <h1 class="header-title">Enfrentamientos del Torneo</h1>
        </header>
        <section class="match-section">
            <h2>Emparejamientos Generados</h2>

            <hr class="view-separator">
            
            <ul class="match-list">
                <?php foreach ($matchups as $match): ?>
                    <li class="match-item">
                        <?= htmlspecialchars($match[0]) ?> vs <?= htmlspecialchars($match[1]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <footer class="footer">
            <p>&copy; <?= date('Y') ?> |
                <a href="https://github.com/Alextc35/chess-tournament/blob/main/LICENSE" class="license" target="_blank">
                    Licencia MIT
                </a>
            </p>
            <p>
                <a href="index.php" class="back-link">Volver</a>
            </p>
        </footer>
    </div>
</body>
</html>
