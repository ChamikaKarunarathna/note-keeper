<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <title>NoteKeeper</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
    <header class="fixed inset-x-0 top-0 z-50">
        <?php require 'includes/header.php' ?>
    </header>

    <main>
        <!-- Toast container -->
        <div id="toast-container" class="fixed bottom-5 md:right-5 z-50"></div>
        <?php require './routes.php' ?>
    </main>


    <!-- The toast message script -->
    <script src="assets/js/toast-message.js"></script>

    <?php
    if (isset($_SESSION['toast'])) {
        $toast = $_SESSION['toast'];
        echo "<script>
            window.onload = function() {
                showToast('{$toast['type']}', '{$toast['message']}');
            };
        </script>";
        unset($_SESSION['toast']);
    }
    ?>
</body>

</html>