<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
<br><br>

    <!--Classe Bootstrap "container" qui permet de faire des marge dans la div-->
    <div class="container">

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>

                <div class="col-4"> 
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>