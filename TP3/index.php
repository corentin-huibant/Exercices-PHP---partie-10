<?php
    $portrait1 = array('name'=>'Victor', 'firstname'=>'Hugo', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
    $portrait2 = array('name'=>'Jean', 'firstname'=>'de La Fontaine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
    $portrait3 = array('name'=>'Pierre', 'firstname'=>'Corneille', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
    $portrait4 = array('name'=>'Jean', 'firstname'=>'Racine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');
    //la fonction showDataArray prend en paramètre une variable générique qui retourne les différents éléments du tableau
    function showDataArray($genericVariable) {
        $name = $genericVariable['name'];
        $firstName = $genericVariable['firstname'];
        $portrait = '<img class="col-lg-offset-5" src="' . $genericVariable['portrait'] . '" title="' . $name  . ' ' . $firstName . '" alt="' . $name  . ' ' . $firstName . '"/>';
        return '<h2>' . $name . ' ' . $firstName . ' </h2> ' . $portrait;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - partie 10, TP3 </title>
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container-fluid">
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8 centered">
                 <h1>TP3</h1>
                 <div class="row"><?php echo showDataArray($portrait1); ?></div>
                 <div class="row"><?php echo showDataArray($portrait2); ?></div>
                 <div class="row"><?php echo showDataArray($portrait3); ?></div>
                 <div class="row"><?php echo showDataArray($portrait4); ?></div>
            </div> 
        </div> 
    </body>
</html>