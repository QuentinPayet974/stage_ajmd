<?php
//Importation des fichiers des librairies
include('phpqrcode/phpqrcode/qrlib.php');
include('phpqrcode/phpqrcode/tools/merge.php');
require('fpdf184/fpdf.php');

//Connexion à la base de données de gestion de QR Code
try {
    $cnx = new PDO('mysql:host=localhost;dbname=gestion_usager', 'root', '');
    $cnx->exec("SET NAMES 'UTF8'");
} catch (Exception $e) {
    die('Erreur technique' . $e->getMessage());
}

//variables
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$datedenaissance = $_POST['Date de naissance'];
$lieudenaissance = $_POST['Lieu de naissance'];
$email = $_POST['Email'];
$tel = $_POST['Telephone'];
$domicile = $_POST['Domicile'];
$orientation = $_POST['Orientation'];
$dateentre = $_POST['Date entrée'];
$apptmaison = $_POST['Appt_Maison'];
$datesortie = $_POST['Date sortie'];
$droitimage = $_POST['Droit image'];
$Numsecu = $_POST['Num sécurité sociale'];
$regimeali = $_POST['Regime alimentaire'];
$allergies = $_POST['Allergies'];
$urgences = $_POST['Urgences'];

//Récupération des données du formulaire
$nom = htmlspecialchars(strtolower($_POST['Nom']));
$prenom = htmlspecialchars(strtolower($_POST['Prenom']));
$Datedenaissance = htmlspecialchars(strtolower($_POST['Date de naissance']));
$lieudenaissance = htmlspecialchars(strtolower($_POST['Lieu de naissance']));
$Email = htmlspecialchars(strtolower($_POST['Email']));
$tel = htmlspecialchars($_POST['Telephone']);
$domicile = htmlspecialchars(strtolower($_POST['Domicile']));
$orientation = htmlspecialchars(strtolower($_POST['Orientation']));
$dateentre = htmlspecialchars(strtolower($_POST['Date entrée']));
$apptmaison = htmlspecialchars(strtolower($_POST['Appt_Maison']));
$datesortie = htmlspecialchars(strtolower($_POST['Dtae sortie']));
$droitimage = htmlspecialchars(strtolower($_POST['Droit image']));
$Numsecu = htmlspecialchars(strtolower($_POST['Num sécurité sociale']));
$regimeali = htmlspecialchars(strtolower($_POST['Regime alimentaire']));
$allergies = htmlspecialchars(strtolower($_POST['Allergies']));
$urgences = htmlspecialchars($_POST['Urgences']);


//Création de QR Code
$nomFichier = md5($nom . '' . $prenom . '' . $tel . '' . date('dmYHms'));
$repertoireStockoge = 'gestion_usager';

$codeContents  = 'BEGIN:VCARD' . "\n";
$codeContents .= 'VERSION:2.1' . "\n";
$codeContents .= 'FN:' . ucfirst($prenom) . ' ' . ucfirst($nom) . "\n";
$codeContents .= 'TEL;HOME;VOICE:' . $tel . "\n";
$codeContents .= 'END:VCARD';

QRcode::png($codeContents, $repertoireStockoge . '/' . $nomFichier . '.png', QR_ECLEVEL_H, 2);

//Base de données
$urlFichier = $repertoireStockoge . '/' . $nomFichier . '.png';
$insertion = $cnx->prepare('INSERT INTO fiche siao(Nom, Prenom, Date de naissance, Lieu de naissance, Email, Telephone, Domicile, Orientation,Date entrée, Appt_Maison, Date sortie, Droit image, Num sécurité sociale, Regime alimentaire, Allergies,Urgences) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$insertion->execute(array($nom, $prenom, $tel, $urlFichier));

//Création du fichier PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Cell(20);
$pdf->SetFont('Arial', 'BU', 18);
$pdf->Cell(0, 10, 'DONNEES D\'UTILISATEUR', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'NOMS : ', 0, 0, 'C');
$pdf->Cell(50, 10, ucfirst($prenom) . ' ' . ucfirst($nom), 0, 1, 'L');
$pdf->Ln();
$pdf->Cell(30, 10, 'TEL. : ', 0, 0, 'C');
$pdf->Cell(50, 10, $tel, 0, 1, 'L');
$pdf->Ln(10);
$pdf->Cell(30);
$pdf->Image('qrcode/' . $nomFichier . '.png', null, null, 30);
$pdf->Output();
