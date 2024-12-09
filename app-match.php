<?php
    include('match.php');
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
    <main class="app">
        <?php include('header.php'); ?>
        <section class="view-players column-content">
            <h2>Emparejamientos Generados</h2>
            <hr>
            <ul class="no-margin-no-padding">
                <?php foreach ($matchups as $match): ?>
                    <li class="list-player">
                        <span class="column-content"><?= htmlspecialchars($match[0]) ?><span>vs</span><?= htmlspecialchars($match[1]) ?></span>
                        <hr>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <p class="center-content"><a href="index.php" class="back-link">Volver</a></p>
        <?php include('footer.php'); ?>
    </main>
</body>
</html>