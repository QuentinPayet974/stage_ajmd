<?php
session_start();
include('connexion.php');

$id = (int) htmlentities(trim($_GET['id']));
// S'il n'y a pas de session alors on ne va pas sur cette page
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
} else {
  $id = $_GET['id'];
}
// On récupère les informations de l'utilisateur connecté
$afficher_profil = $pdo->query(
  "SELECT * 
    FROM fiche_siao 
    WHERE id =$id",
    //array($id)
);

$afficher_profil = $afficher_profil->fetch();

?>


<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/profil.css">
  <link rel="shortcut icon" href="/media/Image/favicon/icon.jpg" type="image/x-icon">
  <title>AJMD-gestion</title>
  <title>Mon profil</title>

  <head>

  <body>
    <h1 class="title">Profil</h1>
    <div class="card">
     <img src="<?php echo $afficher_profil["Photo"] ?>" alt="" width="100px"> 
     <h2> Votre nom est:<?=$afficher_profil['Nom'] . $afficher_profil['Prenom']; ?></h2>
    <div class="title">Quelques informations sur vous : </div>
    <ul>
      <li>Votre date de naissance est:<?= $afficher_profil['Date_de_naissance']?></li>
      <li>Votre lieu de naissance est : <?= $afficher_profil['Lieu_de_naissance'] ?></li>
      <li>Votre mail est : <?= $afficher_profil['Email'] ?></li>
      <li>Votre téléphone est : <?= $afficher_profil['Telephone'] ?></li>
      <li>Votre domicile est : <?= $afficher_profil['Domicile'] ?></li>
      <li>Votre orientation est : <?= $afficher_profil['Orientation'] ?></li>
      <li>Votre Date entrée est : <?= $afficher_profil['Date_entree'] ?></li>
      <li>Vous habitez en : <?= $afficher_profil['Appt_Maison'] ?></li>
      <li>Votre date de sortie est : <?= $afficher_profil['Date_sortie'] ?></li>
      <li>Votre acceptation au droit à l'image : <?= $afficher_profil['Droit_image'] ?></li>
      <li>Votre Numéro sécu est : <?= $afficher_profil['Num_securite_sociale'] ?></li>
      <li>Votre régime est : <?= $afficher_profil['Regime_alimentaire'] ?></li>
      <li>Votre allergie est : <?= $afficher_profil['Allergies'] ?></li>
      <li>Votre urgence est : <?= $afficher_profil['Urgences'] ?></li>
      <li>Votre pièce d'identité : <br><img src=" <?php echo $afficher_profil['Piece_identite'] ?>" ,alt="" width="100px"></li>
      <li>Votre acte de naissance :<img src=" <?php echo $afficher_profil['Acte_de_naissance'] ?>" ,alt="" width="100px"></li>



    </ul>
  </body>

</html>