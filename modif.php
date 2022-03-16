<?php

session_start();
if (!isset($_SESSION['id']))
    header('Location:index.php');
try {
    $pdo[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo = new PDO('mysql:host=localhost;dbname=ajmd-gestion_login', '258803', 'mcGCV7XTyzsDd6', $pdo);
    $id = $_SESSION['id'];

    $req = $pdo->prepare('SELECT * FROM fiche_siao WHERE id="' . $id . '"');
    $req->execute(array(':id' => $id));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
    <title>modifier profil d'inscription</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <?php
    include 'connexion.php';
    ?>

    <div id="section">
        <div id="article">
            <h2>Modifier les donnees d'inscription</h2>

            <form method="post" action="profil.php">
                <p>
                    <?php
                    while ($resultat = $req->fetch()) {
                        echo 'Bonjour' . ' ' . $resultat['login'] . '<br/><br/>';


                        echo  'Modifier votre id : ' . $resultat['id']; ?><br />
                        <input type="text" name="id" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre Photo : ' . $resultat['Photo'] . '<br/>'; ?>
                        <input type="text" name="last-name" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre nom : ' . $resultat['Nom']; ?><br />
                        <input type="text" name="first-name" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre prénom : ' . $resultat['Prenom']; ?><br />
                        <input type="text" name="date_naiss" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre a : ' . $resultat['adresse']; ?><br />
                        <input type="text" name="adresse" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre code postal : ' . $resultat['code_postal']; ?><br />
                        <input type="text" name="postal-code" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre ville : ' . $resultat['ville']; ?><br />
                        <input type="text" name="city" size="30" /> <br /><br />
                        <?php
                        echo  'Modifier votre email : ' . $resultat['email']; ?><br />
                        <input type="text" name="e-mail" size="30" /><br /><br />
                        <?php
                        echo  'Modifier votre mot de passe : '; ?><br />
                        <input type="password" name="pass" size="30" /><br /><br />
                        <?php
                        echo  'Confirmer votre mot de passe : '; ?><br />
                        <input type="password" name="cpass" size="30" /><br /><br />
                        <input type="submit" name="valider" value="modifier" />
                </p>
            </form>
        </div>
        <div id="aside">
            <?php
                        if (isset($_POST['valider'])) {
                            if ((!empty($_POST['login'])) && (!empty($_POST['pass'])) && (!empty($_POST['cpass'])) && (!empty($_POST['last-name']))
                                && (!empty($_POST['first-name'])) && (!empty($_POST['e-mail'])) && (!empty($_POST['date_naiss'])) && (!empty($_POST['adresse']))
                                && (!empty($_POST['postal-code'])) && (!empty($_POST['city']))
                            ) {

                                try {
                                    $req = 'UPDATE client SET nom = :nom, prenom = :prenom, date_naiss =:date_naiss, adresse =:adresse, code_postal =:code_postal, ville =:ville, email =:email, pass =:pass,login=:login, indesirable = :indesirable,id_client= :id_client 
            WHERE id_client ="' . $idclient . '"';
                                    $reqpreparee = $pdo->prepare($req);

                                    $reqpreparee->execute(array(
                                        'nom' => $_POST['last-name'],
                                        'prenom' => $_POST['first-name'],
                                        'date_naiss' => $_POST['date_naiss'],
                                        'adresse' => $_POST['adresse'],
                                        'code_postal' => $_POST['postal-code'],
                                        'ville' => $_POST['city'],
                                        'email' => $_POST['e-mail'],
                                        'pass' => md5($_POST['pass']),
                                        'login' => $_POST['login'],
                                        'indesirable' => 'non',
                                        'id_client' => $idclient
                                    ));
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }

                                echo '<br/><br/> Informations modifiées avec succès <br/>';

                                $reqpreparee->closeCursor();
                            } else {
                                echo 'Vous devez remplir tous les champs !';
                            }
            ?>
                <br /><br /><a href="profile.php">Retour a la page profil</a>
        <?php
                        }
                    }
        ?>
        </div>
</body>

</html>