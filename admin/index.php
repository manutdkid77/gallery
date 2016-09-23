<?php include("includes/header.php"); ?>
<?php
    if(!$session->login_status()) redirect('login.php');
?>

        <!-- Navigation -->
        <?php include("includes/nav.php"); ?>

        <div id="page-wrapper">
            
        <?php include("includes/admin_content.php"); ?>
            
        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>