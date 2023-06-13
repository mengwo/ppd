<div class="main-header">
    <div class="main-title">
        <div class="ppd-title">
            <h1>Port Police Department</h1>
            <h4>PMO-NCN</h4>
        </div>
        <div class="date">
            <input type="date" />
        </div>
    </div>
    <div class="main-logo">
        <img src="../../ppd/img/body-logo.png" alt="ppa logo">
    </div>

</div>
<div class="main-content">
    <section class="cases">
        <h4 class="grid-title" >Previous case</h4>
        <div class="grid-cases">
            <?php
            include 'C:\xampp\htdocs\ppd\components\dashboard\cases\index.php';
            ?>
        </div>
        <div class="grid-summary">
            <?php
            include 'C:\xampp\htdocs\ppd\components\dashboard\summary\index.php';
            ?>
        </div>

    </section>
</div>