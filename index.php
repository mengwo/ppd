<?php
    include './session/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Police Department</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./library/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="main-container">
        <aside>
            <?php include '../ppd/components/dashboard/navigation/index.php'; ?>
        </aside>
        <main id="contentContainer">
        </main>
        <script src="./js/base.js"></script>
</body>

</html>