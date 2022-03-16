<?php
//CONNECTION BDD
try {
    $pdo = new PDO("mysql:host=185.31.40.32;dbNom=ajmd-gestion_login", "258803", "mcGCV7XTyzsDd6");
 } catch (PDOException $e) {
    echo $e->getMessage();
 }

// affiche les contacts modifiables
$req = $pdo->query('SELECT * FROM fiche_siao');
if($_GET['id']){
$namar= filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nomer = substr($namar, 0, 30);
//echo "Nom : ".$nomer."<br>";
}

//selectionne les champs de valeur=au get Nom
$affich = $pdo->prepare("SELECT * FROM fiche_siao WHERE id=:id");
$affich->execute(array(
	'id'=> $nvid
));

$message="";

// partie UPDATE
if(isset($_POST["envoyer"])){

	// place les valeurs entrees par l'utilisateur dans une variable

    $nvid = filter_var($_POST['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvNom = substr($nvnamo, 0, 20);

    $nvPhoto= filter_var($_POST['Photo'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvPhoto = substr($nvPhoto, 0, 20);

    $nvNom = filter_var($_POST['Nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvNom = substr($nvNom, 0, 20);

    $nvPrenom = filter_var($_POST['Prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvPrenom = substr($nvPrenom, 0, 20);

    $nvDate_de_naissance = filter_var($_POST['Date_de_naissance'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvDate_de_naissance = substr($nvDate_de_naissance, 0, 20);

    $nvLieu_de_naissance = filter_var($_POST['Lieu_de_naissance'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvLieu_de_naissance = substr($nvLieu_de_naissance, 0, 20);

    $nvEmail = filter_var($_POST['Email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvEmail = substr($nvEmail, 0, 20);

    $nvTelephone = filter_var($_POST['Telephone'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvTelephone = substr($nvTelephone, 0, 20);

    $nvOrientation = filter_var($_POST['Orientation'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvOrientation = substr($nvOrientation, 0, 20);

    $nvDate_entree = filter_var($_POST['Date_entree'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvDate_entree = substr($nvDate_entree, 0, 20);

    $nvAppt_Maison = filter_var($_POST['Appt_Maison'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvAppt_Maison = substr($nvAppt_Maison, 0, 20);

    $nvDate_sortie = filter_var($_POST['Date_sortie'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvDate_sortie = substr($nvDate_sortie, 0, 20);

    $nvDroit_image = filter_var($_POST['Droit_image'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvDroit_image = substr($nvDroit_image, 0, 20);

    $nvNum_securite_sociale = filter_var($_POST['Num_securite_sociale'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvNum_securite_sociale = substr($nvNum_securite_sociale, 0, 20);

        $nvRegime_alimentaire = filter_var($_POST['Regime_alimentaire'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvRegime_alimentaire = substr($nvRegime_alimentaire, 0, 20);

        $nvAllergies = filter_var($_POST['Allergies'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvAllergies = substr($nvAllergies, 0, 10);

        $nvUrgences = filter_var($_POST['Urgences'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvUrgences = substr($nvUrgences, 0, 30);
/*
        $ida = filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ider = substr($ida, 0, 5);
  */
  $nvPiece_identite = filter_var($_POST['Piece_identite'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $nvPiece_identite = substr($nvPiece_identite, 0, 30);

  $nvActe_de_naissance = filter_var($_POST['Acte_de_naissance'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $nvActe_de_naissance = substr($nvActe_de_naissance, 0, 30);



	// fonction qui verifie que les champs pas vides par le phrase placeholder
	function verif_null($var){
	      if($var!=""
	    	&& $var!="modifier le id"
            && $var!="modifier le nom"
	    	&& $var!="modifier le prennom"
	    	&& $var!="modifier le date de naissance"
	    	&& $var!="modifier le lieu de naissance"
	    	&& $var!="modifier le e-mail"
	    	&& $var!="modifier le num de téléphone"
	    	&& $var!="modifier le domicile"
	    	&& $var!="modifier le orientation"
	    	&& $var!="modifier le date d'entrée"
	    	&& $var!="modifier le appartement ou maison"
	    	&& $var!="modifier le date de sortie"
	    	&& $var!="modifier le droit à l'image"
	    	&& $var!="modifier le numéro de sécurité sociale"
	    	&& $var!="modifier le regime alimentaire"
	    	&& $var!="modifier le allergie"
	    	&& $var!="modifier le urgence"
	    	&& $var!="modifier le piece d'identite"
	    	&& $var!="modifier le acte de naissance"
	        ){return $var;}
	      else{echo"veuillez compléter les vides";}
	}

	// on active la fontion pour chaque variable/si verif null=true alors fait active la requette

	if(verif_null($nvid)
    && verif_null($nvPhoto)
    && verif_null($nvNom)
    && verif_null($nvPrenom)
    && verif_null($nvDate_de_naissance)
    && verif_null($nvLieu_de_naissance)
    && verif_null($nvEmail)
    && verif_null($nvTelephone)
    && verif_null($nvDomicile)
    && verif_null($nvOrientation)
    && verif_null($nvDate_entree)
    && verif_null($nvAppt_Maison)
    && verif_null($nvDate_sortie)
    && verif_null($nvDroit_image)
    && verif_null($nvNum_securite_sociale)
    && verif_null($nvRegime_alimentaire)
    && verif_null($nvAllergies)
    && verif_null($nvUrgences)
    && verif_null($nvPiece_identite)
    && verif_null($nvActe_de_naissance)
  ){
    //echo "nomer dans verifnull egal ".$nomer." | ";
    $message="<br> le contact n° : ".$nvid.", Au nom de ".$nvNom." avec le prénom ".$nvPrenom." a été créé<br>";
    //echo "<br> valeur de message egal ".$message."<br>";

    $datar=[
      'nvid'=> $nvid,
      'nvPhoto'=> $nvPhoto,
      'nvNom'=> $nvNom,
      'nvPrenom'=> $nvPrenom,
      'nvDate_de_naissance'=> $nvDate_de_naissance,
      'Lieu_de_naissance'=> $Lieu_de_naissance,
      'nvEmail'=> $nvEmail,
      'nvTelephone'=> $nvTelephone,
      'nvDomicile'=> $nvDomicile,
      'nvOrientation'=> $nvOrientation,
      'nv_Date_entree'=> $nv_Date_entree,
      'nvAppt_Maison'=> $nvAppt_Maison,
      'nvDate_sortie'=> $nvDate_sortie,
      'nvDroit_image'=> $nvDroit_image,
      'nvNum_securite_sociale'=> $nvNum_securite_sociale,
      'nvRegime_alimentaire'=> $nvRegime_alimentaire,
      'nvAllergies'=> $nvAllergies,
      'nvUrgences'=> $nvUrgences,
      'nvPiece_identite'=> $nvPiece_identite,
      'nvActe_de_naissance'=> $nvActe_de_naissance,

      ];

    /*echo "<br> valeur de nvNom dans datar = ".$datar['nvNom'].
          "<br> valeur de nvfirst_Nom dans datar = ".$datar['nvfirst_Nom'].
          "<br> valeur de nvn_tel dans datar = ".$datar['nvn_tel'].
          "<br> valeur de nvmail dans datar = ".$datar['nvmail'].
          "<br> valeur de ider dans datar = ".$datar['ider']."<br>";

    if(is_int($datar['ider'])){
      echo $datar['ider']." est un integer";
    }
    if(is_int($datar['nvn_tel'])){
      echo $datar['nvn_tel']." est un integer";
    }*/

    $qler="UPDATE `fiche_siao`
    SET id=:nvid, Photo=:nvPhoto, Nom=:nvNom, Prenom=:nvPrenom, Date_de_naissance=:nvDate_de_naissance, Lieu_de_naissance=:nvLieu_de_naissance, Email=:nvEmail, Telephone=:nvTelephone, Domicile=:nvDomicile, Orientation=:nvOrientation, Date_entree=:nvDate_entree, Appt_Maison=:nvAppt_Maison, Date_sortie=:nvDate_sortie, Droit_image=:nvDroit_image, Num_securite_sociale=:nv_Num_securite_sociale, Regime_alimentaire=:nvRegime_alimentaire, Allergies=:nvAllergies, Urgences=:nvUrgences, Piece_identite=:nvPiece_identite, Acte_de_naissance=:nvActe_de_naissance
    WHERE id=:ider";

    $requete=$pdo->prepare($qler);
    $requete->execute($datar);
    /*echo "<br><br>";
    var_dump($requete);

		echo "<br><br> envoi vers la DB";*/
         }

}

?>
<div class="container">
  <div class="row">
	<div class="col-12"><h2>Modifier un contact</h2></div>
  </div>

<div class="row">
	<div class="col-6">
		<section class="fromsociete">
			<div class="row">
				<div class="col-12">

  <ul>
    <?php
    var_dump($qler);
      while ($donnees = $req->fetch()){?>
        <li><a href="profil.php?id=<?= $donnees['id'];?>&Photo=<?= $donnees['Photo'];?>&Photo=<?= $donnees['Photo'];?>&Photo=<?= $donnees['Photo'];?>&Photo=<?= $donnees['Photo'];?>"&Photo=<?= $donnees['Photo'];?>>&Photo=<?= $donnees['Photo'];?></a>
        </li>
    <?php
    }
    // fin de la requete $req
    $req->closeCursor();
    ?>

</ul>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
<?php
	echo $message;
?>

<?php
	if(isset($_GET['Nom'])){
  			$donnees = $affich->fetch()
?>
  <h3>Contact à modifier</h3>
  <div class="container">
  <div class="row">
    <div class="col-6">
  <div class="row m-3">
   <div class="col">Contact :</div>
   <div class="col"><?php echo $nomer;?></div>
  </div>
  <div class="row m-3">
   <div class="col">Photo :</div>
   <div class="col"><?php echo $donneees["Photo"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Nom :</div>
   <div class="col"><?php echo $donneees["Nom"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Prenom :</div>
   <div class="col"><?php echo $donneees["Prenom"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Date de naissance :</div>
   <div class="col"><?php echo $donneees["Date_de_naissance"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Lieu de naissance :</div>
   <div class="col"><?php echo $donneees["Lieu_de_naissance"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Email :</div>
   <div class="col"><?php echo $donneees["Email"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Telephone :</div>
   <div class="col"><?php echo $donneees["Telephone"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Domicile :</div>
   <div class="col"><?php echo $donneees["Domicile"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Orientation :</div>
   <div class="col"><?php echo $donneees["Orientation"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Date d'entrée :</div>
   <div class="col"><?php echo $donneees["Date_entree"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Appt/Maison :</div>
   <div class="col"><?php echo $donneees["Appt_Maison"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Date de sortie :</div>
   <div class="col"><?php echo $donneees["Date_sortie"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Droit à l'image :</div>
   <div class="col"><?php echo $donneees["Droit_image"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Numéro de sécurité sociale :</div>
   <div class="col"><?php echo $donneees["Num_securite_sociale"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Regime alimentaire :</div>
   <div class="col"><?php echo $donneees["Regime_alimentaire"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Allergies :</div>
   <div class="col"><?php echo $donneees["Allergies"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Urgences :</div>
   <div class="col"><?php echo $donneees["Urgences"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Piece identite :</div>
   <div class="col"><?php echo $donneees["Piece_identite"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Acte de naissance :</div>
   <div class="col"><?php echo $donneees["Acte_de_naissance"];?></div>
</div>
<div class="col-6">
  <form action="#" method="post">
  <div class="form-group">
					<label for="first_Nom">id :</label>
					<input class="form-control" Nom="id" type="text" placeholder="modifier le id">
				</div>
                <div class="form-group">
					<label for="first_Nom">Photo :</label>
					<input class="form-control" Nom="Photo" type="text" placeholder="modifier le photo">
				</div>
                <div class="form-group">
					<label for="first_Nom">Nom :</label>
					<input class="form-control" Nom="Nom" type="text" placeholder="modifier le nom">
				</div>
				<div class="form-group">
					<label for="first_Nom">Prénom :</label>
					<input class="form-control" Nom="Prenom" type="text" placeholder="modifier le prénom">
				</div>
                <div class="form-group">
					<label for="first_Nom">Date de naissance :</label>
					<input class="form-control" Nom="Date_de_naissance" type="text" placeholder="modifier le date de naissance">
				</div>
                <div class="form-group">
					<label for="first_Nom">Lieu de naissance :</label>
					<input class="form-control" Nom="Lieu_de_naissance" type="text" placeholder="modifier le lieu de naissance">
				</div>
                <div class="form-group">
					<label for="first_Nom">Email :</label>
					<input class="form-control" Nom="Email" type="text" placeholder="modifier le email">
				</div>
                <div class="form-group">
					<label for="first_Nom">Telephone :</label>
					<input class="form-control" Nom="Telephone" type="text" placeholder="modifier le numéro de telephone">
				</div>
                <div class="form-group">
					<label for="first_Nom">Domicile :</label>
					<input class="form-control" Nom="Domicile" type="text" placeholder="modifier le domicile">
				</div>
                <div class="form-group">
					<label for="first_Nom">Orientation :</label>
					<input class="form-control" Nom="Orientation" type="text" placeholder="modifier le orientation">
				</div>
                <div class="form-group">
					<label for="first_Nom">Date_entrée :</label>
					<input class="form-control" Nom="Date_entrée" type="text" placeholder="modifier le date d'entrée">
				</div>
                <div class="form-group">
					<label for="first_Nom">Appt/Maison :</label>
					<input class="form-control" Nom="Appt_Maison" type="text" placeholder="modifier le appartement ou maison">
				</div>
                <div class="form-group">
					<label for="first_Nom">Date_sortie :</label>
					<input class="form-control" Nom="Date_sortie" type="text" placeholder="modifier le date de sortie">
				</div>
                <div class="form-group">
					<label for="first_Nom">Droit_image :</label>
					<input class="form-control" Nom="Droit_image" type="text" placeholder="modifier le droit à l'image">
				</div>
                <div class="form-group">
					<label for="first_Nom">Numéro de sécurité sociale :</label>
					<input class="form-control" Nom="Num_securite_sociale" type="text" placeholder="modifier le numéro de sécurité sociale">
				</div>
                <div class="form-group">
					<label for="first_Nom">Régime alimentaire :</label>
					<input class="form-control" Nom="Regime_alimentaire" type="text" placeholder="modifier le régime alimentaire">
				</div>
                <div class="form-group">
					<label for="first_Nom">Allergies :</label>
					<input class="form-control" Nom="Allergies" type="text" placeholder="modifier le allergies">
				</div>
                <div class="form-group">
					<label for="first_Nom">Urgences :</label>
					<input class="form-control" Nom="Urgences" type="text" placeholder="modifier le urgence">
				</div>
                <div class="form-group">
					<label for="first_Nom">Piece d'identite :</label>
					<input class="form-control" Nom="Piece_identite" type="text" placeholder="modifier le piece d'identite">
				</div>
                <div class="form-group">
					<label for="first_Nom">Acte de naissance :</label>
					<input class="form-control" Nom="Acte_de_naissance" type="text" placeholder="modifier le acte de naissance">
				</div>
          <button type="submit" Nom="envoyer" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
    </div>
<style>
	.container h2{margin-top:20px;}
	.fromsociete{margin-top:30px;}
	.fromsociete .row{min-height:25px;}
</style>
<?php
	/*$affich->closeCursor();*/
	}
?>
