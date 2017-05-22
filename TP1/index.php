<?php 
    //on initialise nos variables à vide pour pouvoir les récupérer en méthode GET et POST au besoin
    $name = '';
    $firstName = '';
    $date = '';
    $birthCountry = '';
    $nationality = '';
    $phone = '';
    $mail = '';
    $adress = '';
    $postCode = '';
    $city = '';
    $pole = '';
    $badge = '';
    $codecademy = '';
    $hero = '';
    $hack = '';
    $experiences = '';
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
    if(isset($_POST['birthDate'])){
        $date = $_POST['birthDate'];
    }elseif(isset($_GET['birthDate'])){
        $date = $_GET['birthDate'];
    } 
    if(isset($_POST['birthCountry'])){
        $birthCountry = $_POST['birthCountry'];
    }elseif(isset($_GET['birthCountry'])){
        $birthCountry = $_GET['birthCountry'];
    } 
    if(isset($_POST['nationality'])){
        $nationality = $_POST['nationality'];
    }elseif(isset($_GET['nationality'])){
        $nationality = $_GET['nationality'];
    } 
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }elseif(isset($_GET['phone'])){
        $phone = $_GET['phone'];
    } 
    if(isset($_POST['mail'])){
        $mail = $_POST['mail'];
    }elseif(isset($_GET['mail'])){
        $mail = $_GET['mail'];
    } 
    if(isset($_POST['adress'])){
        $adress = $_POST['adress'];
    }elseif(isset($_GET['adress'])){
        $adress = $_GET['adress'];
    } 
    if(isset($_POST['postCode'])){
        $postCode = $_POST['postCode'];
    }elseif(isset($_GET['postCode'])){
        $postCode = $_GET['postCode'];
    } 
    if(isset($_POST['city'])){
        $city = $_POST['city'];
    }elseif(isset($_GET['city'])){
        $city = $_GET['city'];
    } 
    if(isset($_POST['pole'])){
        $pole = $_POST['pole'];
    }elseif(isset($_GET['pole'])){
        $pole = $_GET['pole'];
    } 
    if(isset($_POST['badge'])){
        $badge = $_POST['badge'];
    }elseif(isset($_GET['badge'])){
        $badge = $_GET['badge'];
    } 
    if(isset($_POST['codecademy'])){
        $codecademy = $_POST['codecademy'];
    }elseif(isset($_GET['codecademy'])){
        $codecademy = $_GET['codecademy'];
    } 
    if(isset($_POST['superHero'])){
        $hero = $_POST['superHero'];
    }elseif(isset($_GET['superHero'])){
        $hero = $_GET['superHero'];
    } 
    if(isset($_POST['hack'])){
        $hack = $_POST['hack'];
    }elseif(isset($_GET['hack'])){
        $hack = $_GET['hack'];
    }
    if(isset($_POST['experiences'])){
        $experiences = $_POST['experiences'];
    }elseif(isset($_GET['experiences'])){
        $experiences = $_GET['experiences'];
    } 
    $graduationsList = array('aucun', 'BAC', 'BAC+1', 'BAC+2', 'BAC+3', 'Supérieur');
    //écriture d'une regex qui débute par une majuscule et permet ensuite de nombreuses lettres dont les caractères spéciaux, les tirets et les espaces
    $nameRegex = '#^[A-Z][a-z- éèàêâùïüëç]{2,}$#';
    //écriture d'une regex qui permet un grand nombre de lettres 
    $wordsRegex = '#^[A-Z-a-z- éèàêâùïüëç]{2,}$#';
    //écriture d'une regex qui permet soit 1) d'entre 10 numéros sans espace, le premier étant obligatoirement 0 2) la même chose en espaçant 2 chiffres par un tiret ou un espace
    $phoneRegex = '#(^0[1-9]([0-9]{2}){4}|^0[1-9]([-. ][0-9]{2}){4})$#';
    /*écriture d'une regex pour la date de naissance qui permet d'abord de rentrer de 0 à 31, séparér par un slash ou un tiret
    ensuite les mois, de 0 à 9 ou de 10 à 12
    puis les années de 1900 à 1999 ou de 2000 à 2009*/
    $dateRegex = '#^([0-2][0-9]|[3][0-1])[/-]([0]?[0-9]|[1][0-2])[/-]([1][9][0-9][0-9]|[2][0][0][0-9])$#';
    //écriture d'une regex mail qui permet un grand jeu de combinaisons, entrecoupées d'un @ avant la fermeture par un . obligatoire et une combinaison de 2 à 6 lettres (fr, comm, etc.)
    $mailRegex = '#[A-Z-a-z-0-9-.éèàêâùïüëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
    //écriture d'une regex pour le code postal qui permet une combinaison de 5 chiffres
    $postCodeRegex = '#^([0-9]){5}$#';
    //écriture d'une regex pour l'adresse qui permet d'abord d'entrer des chiffres (11) puis une grande combinaisons de lettres (rue de truc)
    $adressRegex = '#^[0-9][0-9][0-9]?[A-Z-a-z- .éèàêâùïüëç]{2,}$#';
    //regex pôle emploi, sept chiffres et une lettre
    $poleRegex = '#^([0-9 ]){7}[a-z-A-Z]$#';
    $badgeRegex = '#^[0-9][0-9]?$#';
    /*écriture d'une regex pour une adresse url précise qui permet ou pas d'entrer d'abord l'HyperText Transfer Protocol ou HyperText Transfer Protocol Secure ou seulement le double slash
    ensuite l'url du site obligatoire puis le slash
    et enfin les combinaisons pour la langue du site (fr, en, es) et le nom du compte client*/
    $httpRegex = '#^(https://|http://|//)?www.codecademy.com[/][a-z]{2}[/][A-Za-z-. ]{2,}#';
    //on déclare nos variables qui vérifient si le champs demandé a été définie et s'il est conforme à la regex avec la fonction preg_match()
    $nameConfirm = $name && (preg_match($wordsRegex, $name) == true);
    $firstNameConfirm = $firstName && (preg_match($nameRegex, $firstName) == true);
    $dateConfirm = $date && (preg_match($dateRegex, $date) == true);
    $birthCountryConfirm = $birthCountry && (preg_match($wordsRegex, $birthCountry) == true);
    $nationalityConfirm = $nationality && preg_match($wordsRegex, $nationality) == true;
    $phoneConfirm = $phone && (preg_match($phoneRegex, $phone) == true);
    $mailConfirm = $mail && (preg_match($mailRegex, $mail) == true);
    $adressConfirm = $adress&& (preg_match($adressRegex, $adress) == true);
    $postCodeConfirm = $postCode && (preg_match($postCodeRegex, $postCode) == true);
    $cityConfirm = $city && (preg_match($wordsRegex, $city) == true);
    $poleConfirm = $pole && (preg_match($poleRegex, $pole) == true);
    $badgeConfirm = $badge && (preg_match($badgeRegex, $badge) == true);
    $httpConfirm = $codecademy && (preg_match($httpRegex, $codecademy) == true);
    $heroConfirm = $hero;
    $hackConfirm = $hack;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - partie 10, TP1 </title>
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="container-fluid">
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); 
            //si tout est conforme
            if($nameConfirm && $firstNameConfirm && $phoneConfirm && $dateConfirm && $mailConfirm && $adressConfirm && $postCodeConfirm && $birthCountryConfirm && $poleConfirm && $cityConfirm && $badgeConfirm && $httpConfirm && $nationalityConfirm) {
        ?>
        <!-- On affiche les informations du formulaire-->
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6 centered">
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre nom : <?php echo $name ?></p>
                    </div>
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre prénom : <?php echo $firstName ?></p>
                    </div>
                    <div class="row">   
                        <p class="col-lg-offset-2 col-lg-8">Votre date de naissance : <?php echo $date ?></p>
                    </div> 
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre lieu de naissance : <?php echo $birthCountry ?></p>
                    </div> 
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre nationnalité : <?php echo $nationality ?></p>
                    </div>  
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre adresse : <?php echo $adress ?>, <?php echo $postCode . ' ' . $city ?></p>
                    </div> 
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre mail : <?php echo $mail ?></p>
                    </div>  
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre numéro de téléphone : <?php echo $phone ?></p>
                    </div>  
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre diplôme : <?php echo $graduationsList[$_POST['graduations']] ?></p>
                    </div>   
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Pôle Emploi : <?php echo $pole ?></p>
                    </div>   
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Vos badges : <?php echo $badge ?></p>
                    </div> 
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre compte codecademy: <?php echo $codecademy ?></p>
                    </div>
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre super-héros/super-héroïne: <?php echo $hero ?></p>
                    </div> 
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Votre hack: <?php echo $hack ?></p>
                    </div>  
                    <div class="row">
                        <p class="col-lg-offset-2 col-lg-8">Avez-vous déjà codé ? <?php echo $experiences ?></p>
                    </div>
                </div>
            </div>
        <?php
        //si les champs ne sont pas conformes, on affiche le formulaire
            }else{
        ?>
                <div class="row">
                    <form class="col-lg-offset-2 col-lg-8 centered" method="POST" action="index.php">
                         <h1>TP1</h1>
                         <p>Inscrivez vos informations. Renseignez tous les champs !</p>
                         <div class="row">
                                <label class="col-lg-3" for="name">Votre nom : </label>
                                <input class="col-lg-4" type="text" name="name" value="" placeholder="Votre nom"/>
                                <?php
                                    if(empty($_POST['name'])){
                                ?>
                                    <span class="col-lg-4"></span>
                                <?php
                                    }elseif($name && preg_match($wordsRegex, $name) == false) {
                                ?>
                                    <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                    }
                                ?>
                         </div>
                         <div class="row">
                                <label class="col-lg-3" for="firstName">Votre prénom : </label>
                                <input class="col-lg-4" type="text" name="firstName" value="" placeholder="Votre prénom"/>
                                <?php
                                    if(empty($_POST['firstName'])){
                                ?>
                                    <span class="col-lg-4"></span>
                                <?php
                                    }elseif($firstName && preg_match($nameRegex, $firstName) == false) {
                                ?>
                                    <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                                <?php
                                    }
                                ?>
                         </div>  
                         <div class="row">
                            <label class="col-lg-3" for="birthDate">Entrez votre date de naissance : </label>
                            <input class="col-lg-4" type="text" name="birthDate" value="" placeholder="Votre date de naissance"/>
                            <?php
                                if(empty($_POST['birthDate'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($date && preg_match($dateRegex, $birthDate) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div> 
                         <div class="row">
                            <label class="col-lg-3" for="birthCountry">Votre pays de naissance : </label>
                            <input class="col-lg-4" type="text" name="birthCountry" value="" placeholder="Votre pays de naissance"/>
                            <?php
                                if(empty($_POST['birthCountry'])){
                            ?>
                                <span class="col-lg-3"></span>
                            <?php
                                }elseif($birthCountry && preg_match($wordsRegex, $birthCountry) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div> 
                         <div class="row">
                            <label class="col-lg-3" for="nationality">Votre nationalité : </label>
                            <input class="col-lg-4" type="text" name="nationality" value="" placeholder="Votre nationalité"/>
                            <?php
                                if(empty($_POST['nationality'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($nationality && preg_match($wordsRegex, $nationality) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div> 
                         <div class="row">    
                            <label class="col-lg-3" for="adress">Votre adresse : </label>
                            <input class="col-lg-4" type="text" name="adress" value="" placeholder="Votre adresse"/>
                            <?php
                                if(empty($_POST['adress'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($adress && preg_match($adressRegex, $adress) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">
                            <label class="col-lg-3" for="postCode">Votre code postal : </label>
                            <input class="col-lg-4" type="text" name="postCode" value="" placeholder="Votre code postal"/>
                            <?php
                                if(empty($_POST['postCode'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($postCode && preg_match($postCodeRegex, $postCode) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">
                            <label class="col-lg-3" for="city">Votre ville : </label>
                            <input class="col-lg-4" type="text" name="city" value="" placeholder="Votre ville"/>
                            <?php
                                if(empty($_POST['city'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($city && preg_match($wordsRegex, $city) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">  
                            <label class="col-lg-3" for="mail">Votre adresse mail : </label>
                            <input class="col-lg-4" type="text" name="mail" value="" placeholder="Votre adresse mail"/>
                            <?php
                                if(empty($_POST['mail'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($mail && preg_match($mailRegex, $mail) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">    
                            <label class="col-lg-3" for="phone">Votre numéro de téléphone : </label>
                            <input class="col-lg-4" type="text" name="phone" value="" placeholder="Votre numéro de téléphone"/>
                            <?php
                                if(empty($_POST['phone'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($phone && preg_match($phoneRegex, $phone) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">    
                            <label class="col-lg-3">Définissez votre diplôme : </label>
                            <select class="col-lg-4" name="graduations">
                                <?php
                                    $i = 0;
                                    foreach($graduationsList as $graduation) {
                                ?>
                                <option value="<?php echo $i++; ?>"><?php echo $graduation; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                         </div>
                         <div class="row"> 
                            <label class="col-lg-3" for="pole">Votre numéro de pôle emploi : </label>
                            <input class="col-lg-4" type="text" name="pole" value="" placeholder="Votre code pôle emploi"/>
                            <?php
                                if(empty($_POST['pole'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($pole && preg_match($poleRegex, $pole) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">   
                            <label class="col-lg-12" for="badge">Entrez le nombre de badges codecademy que vous avez obtenu : </label>
                            <input class="col-lg-offset-3 col-lg-4" type="text" name="badge" value="" placeholder="Vos badges"/>
                            <?php
                                if(empty($_POST['badge'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($badge && preg_match($badgeRegex, $badge) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">   
                            <label class="col-lg-12" for="codecademy">Entrez le lien de votre compte codecademy : </label>
                            <input class="col-lg-offset-3 col-lg-4" type="text" name="codecademy" value="" placeholder="Votre code codecademy :"/>
                            <?php
                                if(empty($_POST['codecademy'])){
                            ?>
                                <span class="col-lg-4"></span>
                            <?php
                                }elseif($codecademy && preg_match($httpRegex, $codecademy) == false) {
                            ?>
                                <span class="col-lg-4 alert-danger" role="alert">Vous avez fait une grossière erreur !</span>
                            <?php
                                }
                            ?>
                         </div>
                         <div class="row">  
                            <label class="col-lg-12" for="superHero">Si vous êtiez un super-héros/une super-héroïne, que seriez-vous et pourquoi ? </label>
                            <textarea class="col-lg-offset-3 col-lg-5" type="textarea" name="superHero"></textarea>
                         </div>
                         <div class="row">  
                            <label class="col-lg-12" for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) </label>
                            <textarea class="col-lg-offset-3  col-lg-5" type="textarea" name="hack"></textarea>
                         </div>
                         <div class="row">  
                            <label class="col-lg-12">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                            <ul>
                                <li><input type="radio" name="experiences" value="oui" checked="checked"/> <label for="yes">Oui</label></li>
                                <li><input type="radio" name="experiences" value="non" checked="checked"/> <label for="no">Non</label></li>
                                <li><input type="radio" name="experiences" value="ne se prononce pas" checked="checked"/> <label for="dontSay">Ne se prononce pas</label></li>
                            </ul>
                         </div>
                         <!-- Pour récupérer les informations du formulaire, on utilise un input de type submit-->
                         <input id="validate" type="submit" value="Valider"/>
                     </form>
                </div>
            <?php
            }
            ?>
    </body>
</html>