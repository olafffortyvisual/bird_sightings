<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <meta name="description" content="Discover and report bird sightings in your community.">
        <title>Grand Valley Birdwatch</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&family=Playfair+Display:wght@500;600&display-swap"
              rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    </head>
<body>
<header class="bg-white">
    <nav class="navbar navbar-expand-md container py-3">
        <a class="navbar-brand fw-bold" href="/"> Grand Valley <span class="green">Birdwatch</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-nav ms-auto align-items-md-center gap-md-3">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/sightings.php">Explore sightings</a>
                <a class="btn btn-forest mt-2 mt-md-0" href="/report.php">Report a sighting</a>
            </div>
        </div>
    </nav>
</header>
<main>
    <section class="hero text-white d-flex align-items-center">
        <div class="container py-5">
            <small>COMMUNITY BIRD OBSERVATIONS</small>

            <h1 class="my-4">
                Every bird has<br>a <em>story to tell.</em>
            </h1>

            <p class="lead">
                Explore the beauty of birds around you.
                Record your discoveries and help our community
                learn more about local wildlife
            </p>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <a class="btn btn-gold" href="/report.php">
                    Report a sightings
                </a>
                <a class="btn btn-outline-light" href="/sightings.php">
                    Explore Sightings
                </a>
            </div>

            <p class="mt-5 small">
                A community-driven bird observation project
            </p>
        </div>
    </section>

    <section class="container py-5">
        <div class="row g-4 align-items-center py-4">
            <div class="col-md-6">
                <small class="green">OUR MISSION</small>
                <h2 class="mt-3">
                    A closer look at the<br>
                    <em>world above us.</em>
                </h2>
            </div>

            <div class="col-md-6 muted">
                <p>
                    Across aisles. Across landscapes. Across borders. When it comes to our environment,
                    birds are a uniting force.
                </p>
                <p>
                    Birds cross borders, from neighborhoods to states and beyond,
                    migrating tens of thousands of miles across multiple countries from one tip of the planet
                    to the other.
                </p>
            </div>
        </div>
    </section>
    <section class="container pb-5">
        <div class="row g-4">

            <?php
                $cards = [
                    ['volunteer_activism', '01 / CONTRIBUTE', 'Share a sighting','Record the species, location, date and details.'
                        ,'/report.php','Report a bird'],
                    ['visibility', '02 / DISCOVER', 'Explore observation','Browse bird sightings shared by fellow nature.'
                        ,'/sightings.php','View a sightings'],
                    ['connect_without_contact', '03 / CONNECT', 'Protect our wildlife','Every observation  helps build awareness and appreciation.'
                        ,'/report.php','Report a bird'],

                ];
                foreach ($cards as [$icon, $label, $title, $description, $url, $link]):
            ?>
                <div class="col-md-4">
                    <article class="card h-100 border-0 shadow-sm p-4">
                        <div class="card-body p-5">
                            <div class="circle mb-4">
                                <span class="material-symbols-outlined">
                                    <?= $icon ?>
                                </span>
                            </div>
                            <small class="muted"><?= $label ?></small>
                            <h3 class="my-3"><?= $title ?></h3>
                            <p class="muted"><?= $description ?></p>
                            <a class="green fw-bold text-decoration-none" href="<?= $url ?>">
                                <?= $link ?>
                            </a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="cta text-white py-5">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-4">
            <div>
                <small>JOIN THE COMMUNITY</small>
                <h2 class="my-3">
                    Spotted something<br><em>extraordinary?</em>
                </h2>
                <p>We'd love to hear about it.</p>
            </div>

            <a class="btn btn-gold mt-3 mt-md-0" href="/report.php">
                Share your sighting.
            </a>
        </div>
    </section>
</main>
<footer class="text-white py-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2 small">
        <strong>Grand Valley Birdwatch</strong>
        <span>Made for curious  mind and nature lovers.</span>
        <span>@ <?= date('y') ?> Grand Valley Birdwatch</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
</body>
</html>
