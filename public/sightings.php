<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/SightingRepository.php';

$repository = new SightingRepository($pdo);
$sightings = $repository->getAllSightings();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bird sighting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container py-5">
    <a href="/" class="green text-decoration-none">Back to home</a>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <h1 class="fs1">Bird Sighting</h1>
            <p class="muted">Explore bird observations shared by our community.</p>

            <?php if (empty($sightings)) : ?>
                <p class="alert alert-info">No bird observations were found.</p>
            <?php else: ?>
                <div class="row g-4 mt-3">
                    <?php foreach ($sightings as $sighting) : ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card h-100 border-0 shadow-sm p-4">
                                <h3>
                                    <?= htmlspecialchars($sighting['species']) ?>
                                </h3>

                                <p class="muted">
                                    <?= htmlspecialchars($sighting['location']) ?>
                                    <iframe
                                        src="https://maps.google.com/maps?q=<?= rawurldecode($sighting['location']) ?>&output=embed"
                                        width="100%"
                                        height="200"
                                        style="border:0"
                                        loading="lazy"
                                        title="Sighting location">
                                    </iframe>
                                </p>

                                <p>
                                    <?= htmlspecialchars($sighting['description']) ?>
                                </p>

                                <small class="muted">
                                    <?= htmlspecialchars($sighting['sighting_date']) ?>
                                    at
                                    <?= htmlspecialchars($sighting['sighting_time']) ?>
                                </small>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
</body>
</html>