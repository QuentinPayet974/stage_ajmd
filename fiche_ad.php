<?php include "connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="/media/Image/favicon/icon.jpg" type="image/x-icon">
    <title>AJMD-gestion</title>
    <title>Fiche d'admission</title>

</head>

<body>



    <form method="POST" action="ajouter.php">
        <h1 class="button"> Fiche d'admission </h1>
        <legend> Informations </legend>
        <br>

        <label> Id</label>
        <input type="number" name="id" placeholder="Saisissez votre id">
        <br>

        <label>Photo</label>
        <input type="file" name="Image"/>
        </table>
        </span>
        </div>
        </div>
        <div class="col-sm-10">
            <div>

                <br>


                <label> Nom</label>
                <input type="text" name="Nom" placeholder="Saisissez votre nom">
                <br>

                <label> Prenom</label>
                <input type="text" name="Prenom" placeholder="Saissisez votre prenom">
                <br>


                <label> Date de naissance</label>
                <input type="date" name="date_de_naissance" placeholder="Saissisez votre date de naissance">
                <br>





                <label>Lieu de naissance</label>
                <input type="text" name="lieu_de_naissance" placeholder="Saissisez votre lieu de naissance">
                <br>



                <label>Email</label>
                <input type="text" name="email" placeholder="Saissisez votre email">
                <br>


                <label>Telephone</label>
                <input type="text" name="tel" placeholder="Saissisez votre numéro de téléphone">
                <br>


                <label>Domicile</label>
                <input type="text" name="dom" placeholder="Saissisez votre domicile">
                <br>


                <label>Orientation</label>
                <input type="text" name="orientation" placeholder="Saissisez votre orientation">
                <br>


                <label>Date entrée</label>
                <input type="date" name="date_entree" placeholder="Saissisez votre date d'entrée">
                <br>


                <label>Appt_Maison</label>
                <input type="text" name="appt-maison" placeholder="Saissisez appartement ou maison">
                <br>


                <label>Date de sortie</label>
                <input type="date" name="date_sortie" placeholder="Saissisez votre date de sortie">
                <br>


                <label>Droit image</label>
                <input type="text" name="droit_img" placeholder="Saissisez le droit a l'image">
                <br>


                <label>Numéro de la sécurité sociale</label>
                <input type="text" name="num_secu" placeholder="Saissisez votre numéro de sécurité">
                <br>


                <label>Régime alimentaire</label>
                <input type="text" name="regime" placeholder="Saissisez votre régime ">
                <br>


                <label>Allergies</label>
                <input type="text" name="allergie" placeholder="Saissisez votre allergie">
                <br>


                <label>Urgences</label>
                <input type="text" name="urgence" placeholder="Saissisez votre urgence">
                <br>


                <label>Piece_identité</label>
                <label>Image</label>
                <input type="file" name="piece_id"/>
                    </table>
                
                    <br>



                    <label>Acte de naissance</label>    
                    <label>Image</label>
                    <input type="file" name="acte_nais"/>
                        <br>




                            

        <input type="submit" value="Envoyer" name="form_reserv">


</body>


</html>