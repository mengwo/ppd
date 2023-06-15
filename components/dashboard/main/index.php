<?php include 'C:\xampp\htdocs\ppd\components\mixin\content_title\index.php'; ?>
<div class="main-content">
    <section class="cases">
        <h4 class="grid-title">Previous case</h4>
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
<?php
    include 'C:\xampp\htdocs\ppd\components\modal\profile_forms\index.php';
    include 'C:\xampp\htdocs\ppd\components\modal\add_forms\index.php';
    include 'C:\xampp\htdocs\ppd\components\modal\download_cases\index.php';
?>