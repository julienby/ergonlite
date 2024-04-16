<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark" />
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
/>
</head>
<body>
    <?php //require_once __DIR__ . '/../partials/navbar.php'; ?>
    <?php // S'assurer que les données nécessaires sont définies
        $navbarData = $data['navbar'] ?? null;
    ?>
    <?php if ($navbarData): ?>
        <?php include __DIR__ . '/../partials/navbar.php'; ?>
    <?php endif; ?>


    <!-- Contenu principal -->
    <main class="container">
        <?=$content?>
    </main>

    <?php //require_once __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>

