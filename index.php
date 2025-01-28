<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <title>NoteKeeper</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Flowbite CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <header class="fixed inset-x-0 top-0 z-50">
        <?php require 'includes/header.php' ?>
    </header>

    <main>
        <?php require './routes.php' ?>
    </main>

    <!-- Flowbite Script Start -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
    <!-- Flowbite Script End -->
</body>

</html>