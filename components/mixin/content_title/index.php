<?php
// Set the default timezone to Philippines/Manila
date_default_timezone_set('Asia/Manila');

// Get the current date
$currentDate = date('d-m-Y');

// Get the current time
$currentTime = date('H:i');
?>

<div class="main-header">
    <div class="main-title">
        <div class="ppd-title">
            <h1>Port Police Department</h1>
            <h4>PMO-NCN</h4>
        </div>
        <div class="date">
          <h4><?php echo $currentDate . " " . $currentTime; ?></h4>
        </div>
    </div>
    <div class="main-logo">
        <img src="../../ppd/img/body-logo.png" alt="ppa logo">
    </div>
</div>
