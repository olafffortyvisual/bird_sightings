<?php
session_start();
$old_input = $_SESSION['old_input'] ?? [];
unset($_SESSION['old_input']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report a Sighting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container py-5">
    <a href="/" class="green text-decoration-none">Back to home</a>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <h1 class="fs1">Report a Sighting</h1>
            <p class="muted">Share your bird observation with our community!</p>

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?= htmlspecialchars($_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
            <form id="sightingForm" action="/save.php" method="post" class="card border-0 shadow-sm p-4">
                <h3>Your Information</h3>
                <p class="muted">Optional contact details</p>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="First name"
                               value="<?= htmlspecialchars($old_input['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                               value="<?= htmlspecialchars($old_input['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone"
                               value="<?= htmlspecialchars($old_input['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>
                </div>

                <h3>Bird Observations</h3>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label for="sightingDate" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="sightingDate" name="sightingDate"
                               value="<?= htmlspecialchars($old_input['sightingDate'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="sightingTime" class="form-label">Time *</label>
                        <input type="time" class="form-control" id="sightingTime" name="sightingTime""
                                value="<?= htmlspecialchars($old_input['sightingTime'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="location" class="form-label">Location *</label>
                        <input class="form-control" id="location" name="location"
                               value="<?= htmlspecialchars($old_input['location'] ?? '', ENT_QUOTES, 'UTF-8') ?>"required>
                    </div>
                    <div class="col-12">
                        <label for="species" class="form-label">Species *</label>
                        <input class="form-control" id="species" name="species"
                               value="<?= htmlspecialchars($old_input['species'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required> <?= htmlspecialchars($old_input['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-forest mt-4">Submit Sighting</button>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
</body>
</html>