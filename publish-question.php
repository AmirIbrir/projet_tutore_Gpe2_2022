<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/publishQuestionAction.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    
    <form class="container" method="POST"> <!--"POST"=> envoyer des données d'un formulaire vers code PHP -->
        <?php
            if(isset($errorMsg)){
                echo '<p class="text-danger">'.$errorMsg.'</p>';
            }elseif(isset($successMsg)){
                echo '<p>'.$successMsg.'</p>';
            }
        ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
        <input type="text" class="form-control" name="title"><!--un name pour avoir accès a chaque données-->
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Description de la question</label>
        <textarea type="text" class="form-control" name="description" ></textarea>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
        <textarea type="text" class="form-control" name="content" ></textarea>
    </div>
   
    <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
    
</form>

    
</body>
</html>