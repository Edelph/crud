<?php
use app\Connection;
use app\Formulaire;



if (isset($_GET['nom'])){
    $pdo = Connection::getInstancePdo();
    $statement = $pdo->prepare("INSERT INTO etudiant ( nom, prenom, ville_naissance, date_naissance, matricule) VALUES (:nom, :prenom, :ville_naissance, :date_naissance, :matricule)");
    $statement->execute([
        "nom"=> $_GET['nom'],
        "prenom"=> $_GET['prenom'],
        "ville_naissance"=> $_GET['villeNaiss'],
        "date_naissance"=> $_GET['dateNaiss'],
        "matricule"=> $_GET['matricule'],
    ]);
}


$form = new Formulaire();

?>



<h1>ajouter des etudiants </h1>

<form action="" method="get"> 
    <?=  $form->input( "nom", "nom :"); ?>
    <?=  $form->input( "prenom", "prenom :"); ?>
    <?=  $form->input( "villeNaiss", "ville de naissance :"); ?>
    <?=  $form->input( "matricule", "numero matricule :"); ?>
    <?=  $form->input( "dateNaiss", "date de naissance :"); ?>
    <?= $form->putBtn("submit", "primary","enregistrer")?>
</form>
   

