<?php 
    session_start();
    require('actions/users/showOneUsersProfileAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
    <?php 
        //Si variable $errorMsg existe affiché messsage erreur
        if (isset($errorMsg)){echo $errorMsg;}

        if (isset($getHisQuestions)){
            ?>
            <div class="card">
                <div class="card-body">
                    <h4>@<?php echo $user_pseudo ?></h4>
                    <hr>
                    <p><?php echo $user_firstname . ' ' . $user_lastname ?></p>
                </div>
            </div>
            <br>
            <?php

            while($question = $getHisQuestions->fetch()){
                ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo $question['titre']; ?>
                    </div>
                    <div class="card-body">
                        <?php echo $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        Par <?php echo $question['pseudo_auteur']; ?> le <?php echo $question['date_publication']; ?>
                    </div>
                </div>
                <br> 
                <?php
            }
        }
    ?>
    </div>
    
</body>
</html>