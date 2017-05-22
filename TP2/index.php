<?php 
//on initialise nos variables à vide pour pouvoir les récupérer en méthode GET et POST au besoin
    $name = '';
    $firstName = '';
    $age = '';
    $enterprise = '';
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }elseif(isset($_GET['name'])){
        $name = $_GET['name'];
    } 
    if(isset($_POST['firstName'])){
        $firstName = $_POST['firstName'];
    }elseif(isset($_GET['firstName'])){
        $firstName = $_GET['firstName'];
    } 
    if(isset($_POST['age'])){
        $age = $_POST['age'];
    }elseif(isset($_GET['age'])){
        $age = $_GET['age'];
    } 
    if(isset($_POST['enterprise'])){
        $enterprise = $_POST['enterprise'];
    }elseif(isset($_GET['enterprise'])){
        $enterprise = $_GET['enterprise'];
    } 
    $gendersList = array('Monsieur', 'Madame', 'Un truc mieux');
    //écriture d'une regex qui débute par une majuscule et permet ensuite de nombreuses lettres dont les caractères spéciaux, les tirets et les espaces
    $nameRegex = '#^[A-Z][a-z- éèàêâùïüëç]{2,}$#';
    //écriture d'une regex qui permet un grand nombre de lettres 
    $wordsRegex = '#^[A-Z-a-z- éèàêâùïüëç]{2,}$#';
    //écriture d'une regex pour l'âge qui permet soit la rédaction de 1 ou 2 chiffres (donc de 0 à 99) ou soit la rédaction de 100 à 109.
    $ageRegex = '#(^[0-9][0-9]?$|^[1][0][0-9]$)#';
    $enterpriseRegex = '#^[A-Z-a-z0-9- éèàêâùïüëç.]{2,}$#';
    //déclaration de variables qui vérifient que le champs en question est rempli puis qu'il est conforme à la regex
    $nameConfirm = $name && (preg_match($wordsRegex, $name) == true);
    $firstNameConfirm = $firstName && (preg_match($nameRegex, $firstName) == true);
    $ageConfirm = $age && (preg_match($ageRegex, $age) == true);
    $enterpriseConfirm = $enterprise && (preg_match($enterpriseRegex, $enterprise) == true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - partie 10, TP2 </title>
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container-fluid">
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
                <div class="row">
                    <form class="col-lg-offset-2 col-lg-8 centered" method="POST" action="index.php">
                         <h1>TP2</h1>
                         <p>Inscrivez vos informations. Renseignez tous les champs !</p>
                         <div class="row">    
                            <label class="col-lg-3">Vous êtes : </label>
                            <select class="col-lg-4" name="gender">
                                <?php
                                // On genere les options en allant chercher les données dans le tableau $genderList
                                foreach ($gendersList as $key => $gender) {
                                    ?>
                                    <option value="<?= $key ?>" 
                                        <?php 
                                        if(empty($_POST['gender'])){ 
                                            echo ''; 
                                        }elseif($_POST['gender'] == $key){ echo 'selected'; }?>><?= $gender ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                         </div>
                         <div class="row">
                                <label class="col-lg-3" for="name">Votre nom : </label>
                                <input class="col-lg-4" type="text" name="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="Votre nom"/>
                                <?php
                                //Tant qu'il est vide, on affiche rien
                                    if(empty($_POST['name'])){
                                ?>
                                    <span class="col-lg-4"></span>
                                <?php
                                //ici, on vérifie que le champs est bien rempli mais qu'il n'est pas conforme à la regex pour affcher un message d'erreur
                                    }elseif($name && preg_match($wordsRegex, $name) == false){
                                ?>
                                    <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                //sinon, dans le cas ou il est conforme mais que le reste ne l'est pas, on affiche un message de réussite
                                    }else{
                                ?>
                                    <span class="col-lg-4 alert-success" role="alert">Bien ! </span>
                                <?php
                                    }
                                ?>
                         </div>
                         <div class="row">
                                <label class="col-lg-3" for="firstName">Votre prénom : </label>
                                <input class="col-lg-4" type="text" name="firstName" value="<?php if(isset($_POST['firstName'])) { echo $_POST['firstName']; } ?>" placeholder="Votre prénom"/>
                                <?php
                                //Tant qu'il est vide, on affiche rien
                                    if(empty($_POST['firstName'])){
                                ?>
                                    <span class="col-lg-4"></span>
                                <?php
                                //ici, on vérifie que le champs est bien rempli mais qu'il n'est pas conforme à la regex pour affcher un message d'erreur
                                    }elseif($firstName && preg_match($nameRegex, $firstName) == false) {
                                ?>
                                    <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                //sinon, dans le cas ou il est conforme mais que le reste ne l'est pas, on affiche un message de réussite
                                    }else{
                                ?>
                                    <span class="col-lg-4 alert-success" role="alert">Bien ! </span>
                                <?php
                                    }
                                ?>
                         </div>  
                         <div class="row">
                                <label class="col-lg-3" for="age">Votre âge : </label>
                                <input class="col-lg-4" type="text" name="age" value="<?php if(isset($_POST['age'])) { echo $_POST['age']; } ?>" placeholder="Votre âge"/>
                                <?php
                                //Tant qu'il est vide, on affiche rien
                                    if(empty($_POST['age'])){
                                ?>
                                    <span class="col-lg-4"></span>
                                <?php
                                //ici, on vérifie que le champs est bien rempli mais qu'il n'est pas conforme à la regex pour affcher un message d'erreur
                                    }elseif($age && preg_match($ageRegex, $age) == false) {
                                ?>
                                     <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                //sinon, dans le cas ou il est conforme mais que le reste ne l'est pas, on affiche un message de réussite
                                    }else{
                                ?>
                                    <span class="col-lg-4 alert-success" role="alert">Bien ! </span>
                                <?php
                                        }
                                ?>
                         </div>  
                         <div class="row">  
                                <label class="col-lg-3" for="enterprise">Votre société : </label>
                                <input class="col-lg-4" type="text" name="enterprise" value="<?php if(isset($_POST['enterprise'])) { echo $_POST['enterprise']; } ?>" placeholder="Votre société"/>
                                <?php
                                //Tant qu'il est vide, on affiche rien
                                    if(empty($_POST['enterprise'])){
                                ?>
                                    <span class="col-lg-4"></span>   
                                <?php
                                //ici, on vérifie que le champs est bien rempli mais qu'il n'est pas conforme à la regex pour affcher un message d'erreur
                                    }elseif($enterprise && preg_match($enterpriseRegex, $enterprise) == false) {
                                ?>
                                    <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                //sinon, dans le cas ou il est conforme mais que le reste ne l'est pas, on affiche un message de réussite
                                    }else{
                                ?>
                                    <span class="col-lg-4 alert-success" role="alert">Bien ! </span>
                                 <?php
                                      }
                                ?>
                         </div>
                         <!-- Pour récupérer les informations du formulaire, on utilise un input de type submit-->
                         <input id="validate" type="submit" value="Valider"/>
                    </form>
                </div>
                <?php
                //si tous les champs sont conformes, que ce soit par rapport au remplissage du champs ou à la regex...
                     if($nameConfirm && $firstNameConfirm && $ageConfirm && $enterpriseConfirm){
                ?>
                    <!-- On récupère les informations que l'on affiche en-dessous du formulaire -->
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-6 centered">
                            <div class="row">
                                <p class="col-lg-offset-2 col-lg-8">Votre civilité : <?php echo $gendersList[$_POST['gender']] ?></p>
                            </div> 
                            <div class="row">
                                <p class="col-lg-offset-2 col-lg-8">Votre nom : <?php echo $name ?></p>
                            </div>
                            <div class="row">
                                <p class="col-lg-offset-2 col-lg-8">Votre prénom : <?php echo $firstName ?></p>
                            </div> 
                            <div class="row">
                                <p class="col-lg-offset-2 col-lg-8">Votre âge : <?php echo $age ?></p>
                            </div> 
                            <div class="row">
                                <p class="col-lg-offset-2 col-lg-8">Votre société : <?php echo $enterprise ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                    }else{
                ?>
                    <div></div>
                <?php
                    }
                ?>
    </body>
</html>