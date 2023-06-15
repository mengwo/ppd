<!DOCTYPE html>
<html>
<head>
    <title>History Tab</title>
    <style>
        .history-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>History Tab</h1>
    
    <?php
    // Simulated history data
    $history = [
        ['url' => 'https://example.com', 'title' => 'Example Website', 'date' => '2023-06-14'],
        ['url' => 'https://example2.com', 'title' => 'Another Example', 'date' => '2023-06-13'],
        ['url' => 'https://example3.com', 'title' => 'Third Example', 'date' => '2023-06-12'],
    ];
    
    // Loop through history items and display them
    foreach ($history as $item) {
        echo '<div class="history-item">';
        echo '<h3><a href="' . $item['url'] . '">' . $item['title'] . '</a></h3>';
        echo '<p>Visited on ' . $item['date'] . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>
