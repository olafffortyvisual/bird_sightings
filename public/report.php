<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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

            <?php if(isset($_GET['success']) && $_GET['success'] == 'true'){ ?>}
                <div class="alert alert-success" role="alert">
                    Bird sighting saves successfully!
                </div>
            <?php } ?>
            <form id="sightingForm" action="/save.php" method="post" class="card border-0 shadow-sm p-4">
                <h3>Your Information</h3>
                <p class="muted">Optional contact details</p>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    </div>
                </div>

                <h3>Bird Observations</h3>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="time" class="form-label">Time *</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="col-12">
                        <label for="location" class="form-label">Location *</label>
                        <input class="form-control" id="location" name="location" required>
                    </div>
                    <div class="col-12">
                        <label for="species" class="form-label">Species *</label>
                        <input class="form-control" id="species" name="species" required>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
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