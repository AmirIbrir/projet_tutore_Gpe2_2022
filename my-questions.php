<?php 
    require('actions/questions/myQuestionsAction.php'); 
    require('actions/users/securityAction.php'); //Permet à l'utilisateur d'etre rediriger vers la page d'accueil si pas authentifé

?>
<!DOCTYPE html>
<html lang="en">
<?php include  'includes/head.php'?>
<body>
    <?php include 'includes/navbar.php'?>
    <br><br>
    <div class="container">
    <?php
        while($questions = $getAllQuestions->fetch()){ //Récupérer chaque données
            ?>
            <!-- Dans Bootstrap rechercher 'cards' -->
            <div class="card">
                <div class="card-header">
                    
                    <p>Titre question: <?php echo $questions['titre']; ?></p>
                </div>
                <div class="card-body">
                    
                    <p class="card-text">
                        <p>Description: <?php echo $questions['description']; ?></p>
                    </p>
                    <a href="#" class="btn btn-primary">Accéder à la question</a>
                    <a href="#" class="btn btn-warning">Modifier la question</a>
    
                </div>
            </div>
            <br>
            <?php
        }
    ?>
    </div>
</body>
</html>