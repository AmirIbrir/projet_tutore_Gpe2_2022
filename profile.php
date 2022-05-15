<?php 
    session_start();
    require('actions/users/showOneUsersProfileAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php'; ?>

    <?php 
        if (isset($errorMsg)){echo $errorMsg;}

        if (isset($getHisQuestion)){
            ?>
            <div class="card"></div>
            <?php
        }
    ?>
    
</body>
</html>