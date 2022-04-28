<?php require('actions/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">

//Pour avoir accès à tout le code qui se trouve dans le fichier head.php
<?php include 'includes/head.php'; ?>
<body>
    
    <!--Ce sont les classes qui nous permettent d'avoir acces au code CSS de bootstrap-->
    <br>
    <br>
    <form class="container" method="POST"> <!--"POST"=> envoyer des données d'un formulaire vers code PHP -->
        <?php
            if(isset($errorMsg)){
                echo '<p>'.$errorMsg.'</p>';
            }
        ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo"><!--un name pour avoir accès a chaque données-->
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastname" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="firstname" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
</form>

</body>
</html>
