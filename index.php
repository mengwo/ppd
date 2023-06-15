<?php
include './session/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Police Department</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="./library/table/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="./library/table/daterangepicker.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./library/table/moment.min.js"></script>
    <script src="./library/table/daterangepicker.min.js"></script>
    <script src="./library/table/Chart.bundle.min.js"></script>
    <script src="./library/table/jquery.dataTables.min.js"></script>
    <script src="./library/table/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</head>

<body>
    <div class="main-container">
        <aside>
            <?php include '../ppd/components/mixin/navigation/index.php'; ?>
        </aside>
        <main id="contentContainer">
        </main>
    </div>
    <script src="./js/base.js"></script>
</body>

</html>
