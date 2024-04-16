<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Métadonnées, liens CSS, etc. -->
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
    <main>
        <?=$content?>
    </main>

    <?php //require_once __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>

