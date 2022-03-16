<?php

include "connexion.php";
include "qrcode2/index.php";

//QRcode::png('http://ajmd-gestion.alwaysdata.net/profil.php?id=1)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    
if (isset($_POST["form_reserv"])) {

    //Variables pour récupérer le formulaire
    $id=$_POST['id'];
    $Photo=$_POST["Photo"];
    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $Date_de_naissance=$_POST["date_de_naissance"];
    $Lieu_de_naissance=$_POST["lieu_de_naissance"];
    $Email = $_POST["email"];
    $Telephone = $_POST["tel"];
    $Domicile = $_POST["dom"];
    $Orientation = $_POST["orientation"];
    $Date_entree = $_POST["date_entree"];
    $Appt_Maison = $_POST["appt-maison"];
    $Date_sortie = $_POST["date_sortie"];
    $Droit_image = $_POST["droit_img"];
    $Num_securite_sociale = $_POST["num_secu"];
    $Regime_alimentaire = $_POST["regime"];
    $Allergies = $_POST["allergie"];
    $Urgences = $_POST["urgence"];
    $Piece_idendite = $_POST["piece_id"];
    $Acte_de_naissance= $_POST["acte_nais"];
    $qr_code = $_POST["qr_code"];
    




    /*//Sélectionne le prix officiel de la voiture choisis
    $prixConcern1 = "SELECT prix FROM vehicule WHERE num_vehicule = ?";
    $prixConcern2 = $cnx->prepare($prixConcern1);
    $prixConcern2->execute([$idVehicule]);
    $prixConcern3 = $prixConcern2->fetch(PDO::FETCH_ASSOC);
    $prixOff = $prixConcern3["prix"];


    $prixNegos = $_POST["prixNegos"];*/

    //O,Insertion dans la base de données
    $reqInsert1 = "INSERT INTO fiche_siao(id,Image, Nom, Prenom, Date_de_naissance, Lieu_de_naissance, Email, Telephone, Domicile, Orientation,Date_entree,Appt_Maison,Date_sortie,Droit_image, Num_securite_sociale, Regime_alimentaire, Allergies, Urgences, Piece_idendite, Acte_de_naissance, qr_code)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $reqInsert2 = $pdo->prepare($reqInsert1);
    $reqInsert2->execute([$id,$Image, $Nom, $Prenom, $Date_de_naissance, $Lieu_de_naissance, $Email, $Telephone, $Domicile, $Orientation,$Date_entree,$Appt_Maison, $Date_sortie,$Droit_image, $Num_securite_sociale, $Regime_alimentaire, $Allergies, $Urgences, $Piece_idendite, $Acte_de_naissance, $qr_code]);

    echo "Le contact à été enregistré dans la base de données";
}
