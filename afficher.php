<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
    header("location:login.php");
    exit();
}
if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue " .
        $_SESSION["prenomNom"] .
        " dans votre espace personnel";
else
    $bienvenue = "Bonsoir et bienvenue " .
        $_SESSION["prenomNom"] .
        " dans votre espace personnel";
?>

<head>
    <title>Liste</title>
    <meta charset="utf-8">
    <!-- AJOUT UN LIEN CSS AVEC LA PAGE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/afficher.css">
    <link rel="shortcut icon" href="/media/Image/favicon/icon.jpg" type="image/x-icon">
    <title>AJMD-gestion</title>

</head>
<tbody>



    <?php
    include "connexion.php";
    include "qrcode2/qrlib.php";
    $siteUrl = 'http://ajmd-gestion.alwaysdata.net'; // A changer 

    function createQrcode($id, $link)
    {
        $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 3;
        $filename = 'qrcode_user' . $id . '.png';
        $filepath = $PNG_TEMP_DIR . $filename;
        QRcode::png($link, $filepath, $errorCorrectionLevel, $matrixPointSize, 2);
        return '/temp/' . $filename;
    }




    //include "media";

    //Sélection de la liste des reservations
    $admission1 = "SELECT * FROM fiche_siao";
    $admission2 = $pdo->query($admission1);

    ?>




    <div class="corpsPage">

        <!-- A -->

        <body onLoad="document.fo.login.focus()">
            <h2><?php echo $bienvenue ?></h2>
            [ <a href="deconnexion.php">Se déconnecter</a> ]
        </body>


        <h1 class="titrePage">Formulaire</h1>
        <div class="contenuePrincipal" style="text-align: center;">
            <!--<img src="media/vehicule/because.jpg" style="width: 100%"> -->

            <table>
                <thead>
                    <tr>

                        <td> PHOTO </td>
                        <td> NOM </td>
                        <td> PRENOM </td>
                        <td> EMAIL</td>
                        <td> QRCODE </td>
                        <td> ACTIONS </td>
                    </tr>
                </thead>
                <?php while ($admission3 = $admission2->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php
                    $linkQrcode = createQrcode($admission3['id'], $siteUrl . "/profil.php?id=" . $admission3['id']);
                    $qrcodeLink = $siteUrl . $linkQrcode;
                    ?>
                    <tr>

                        <td> <img src="<?php echo $admission3["Photo"] ?>" alt="" width="100px"> </td>
                        <td> <?php echo $admission3["Nom"] ?> </td>
                        <td> <?php echo $admission3["Prenom"] ?> </td>
                        <td> <?php echo $admission3["Email"] ?> </td>
                        <td> <img src="<?php echo $qrcodeLink ?>" alt=""> </td>
                        <td>
                            <a href="/profil.php?id=<?= $admission3['id'] ?> ">Voir</a>
                            <a href="/edit.php?id=<?= $admission3['id'] ?> ">Modifier</a>
                            <a onclick="return confirm('Êtes vous sûr de vouloir procéder?')" href="/delete.php?id=<?= $admission3['id'] ?> ">Supprimer</a> 
                        </td>

                    </tr>
                <?php } ?>


            </table>


        </div>
    </div>

</tbody>


<br>
<a href="fiche_ad.php">Ajouter quelqu'un</a>

<br>

<!--
<form method="GET" action="profil.php">
        <h1 class="button"> Récupérer le profil </h1>
                <input type="text" name="qr_code" placeholder="Adresse mail de la personne à récupérer ">
                <br>
                <input type="submit" value="Envoyer" name="form_reserv">
        -->

<!-- GENERATEUR QR CODE -->

<?php
/*
if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $id=htmlentities(trim($id));
            $Photo = htmlentities(trim($Photo));
            $Nom = htmlentities(trim($Nom));
            $Prenom = htmlentities(strtolower(trim($Prenom)));
            $Date_de_naissance = htmlentities(trim($Date_de_naissance));
            $Lieu_de_naissance = htmlentities(trim($Lieu_de_naissance));
            $Email = htmlentities(trim($Email));
            $Telephone = htmlentities(trim($Telephone));
            $Domicile = htmlentities(trim($Domicile));
            $Orientation = htmlentities(trim($Orientation));
            $Date_entree = htmlentities(trim($Date_entree));
            $Appt_Maison = htmlentities(trim($Appt_Maison));
            $Date_sortie = htmlentities(trim($Date_sortie));
            $Droit_image = htmlentities(trim($Droit_image));
            $Numero_securite_sociale = htmlentities(trim($Numero_securite_sociale));
            $Regime_alimentaire = htmlentities(trim($Regime_alimentaire));
            $Allergies = htmlentities(trim($Allergies));
            $Urgences = htmlentities(trim($Urgences));
            $Piece_identite = htmlentities(trim($Piece_identite));
            $Acte_de_naissance = htmlentities(trim($Acte_de_naissance));
            
            if(empty($id)){
                $valid = false;
                $er_id = "Il faut mettre une id";
            }



            if(empty($Photo)){
                $valid = false;
                $er_Photo = "Il faut mettre une photo";
            }
 
            if(empty($Nom)){
                $valid = false;
                $er_Nom = "Il faut mettre un Nom";
            }
 
            if(empty($Prenom)){
                $valid = false;
                $er_Prenom = "Il faut mettre un Prenom";
            }

            if(empty($Date_de_naissance)){
                $valid = false;
                $er_Date_de_naissance = "Il faut mettre un Date_de_naissance";
            }

            if(empty($Lieu_de_naissance)){
                $valid = false;
                $er_Lieu_de_naissance = "Il faut mettre un Lieu_de_naissance";
            }

            if(empty($Email)){
                $valid = false;
                $er_Email = "Il faut mettre un Email";
            }

            if(empty($Telephone)){
                $valid = false;
                $er_Telephone = "Il faut mettre un Telephone";
            }

            if(empty($Domicile)){
                $valid = false;
                $er_Domicile = "Il faut mettre un Domicile";
            }

            if(empty($Orientation)){
                $valid = false;
                $er_Orientation = "Il faut mettre une Orientation";
            }

            if(empty($Date_entree)){
                $valid = false;
                $er_Date_entree = "Il faut mettre une Date_entree";
            }

            if(empty($Appt_Maison)){
                $valid = false;
                $er_Appt_Maison = "Il faut mettre un Appt_Maison";
            }

            if(empty($Date_sortie)){
                $valid = false;
                $er_Date_sortie = "Il faut mettre une Date_sortie";
            }

            if(empty($Droit_image)){
                $valid = false;
                $er_Droit_image = "Il faut mettre un Droit_image";
            }

            if(empty($Numero_securite_sociale)){
                $valid = false;
                $er_Numero_securite_sociale = "Il faut mettre un Numero_securite_sociale";
            }

            if(empty($Regime_alimentaire)){
                $valid = false;
                $er_Regime_alimentaire = "Il faut mettre un Regime_alimentaire";
            }

            if(empty($Allergies)){
                $valid = false;
                $er_Allergies = "Il faut mettre une Allergie";
            }

            if(empty($Urgences)){
                $valid = false;
                $er_Urgences = "Il faut mettre un Urgences";
            }

            if(empty($Piece_identite)){
                $valid = false;
                $er_Piece_identite = "Il faut mettre une Piece_identite";
            }

            if(empty($Acte_de_naissance)){
                $valid = false;
                $er_Acte_de_naissance = "Il faut mettre un Acte_de_naissance";
            }

                else{
                $req_Email = $pdo->query("SELECT * 
                    FROM fiche_siao 
                    WHERE id = ?",
                    array($id));
                $req_Email = $req_Email->fetch();
 
            }
 
            if ($valid){
 
                $pdo->insert("UPDATE fiche_siao SET id = ?, Photo = ?, Nom = ?, Prenom = ?, Date_de_naissance = ?, Lieu_de_naissance = ?, Email = ?, Telephone = ?, Domicile = ?, Orientation = ?, Date_entree = ?, Appt_Maison = ?, Date_sortie = ?, Droit_image = ?, Numero_securite_sociale = ?, Regime_alimentaire = ?, Allergies = ?, Urgences = ?, Piece_identite = ?, Acte_de_naissance
                    WHERE id = ?");

                header('Location: profil.php');
                exit;
            }   
        }
    }
    */
?>



</html>