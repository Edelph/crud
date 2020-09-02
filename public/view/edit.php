<?php

use app\Connection;
use app\Etudiant;
use app\Formulaire;


if (isset($_GET['nom'])){
    $pdo = Connection::getInstancePdo();
    $statement = $pdo->prepare("UPDATE etudiant 
        SET     
            nom = :nom, prenom = :prenom, 
            ville_naissance = :ville_naissance, 
            date_naissance = :date_naissance, 
            matricule = :matricule 
        WHERE 
            id_etudiant = :id");

    $id = (int)$params["id"];
    $statement->execute([
        "nom"=> $_GET['nom'],
        "prenom"=> $_GET['prenom'],
        "ville_naissance"=> $_GET['ville_naissance'],
        "date_naissance"=> $_GET['date_naissance'],
        "matricule"=> $_GET['matricule'],
        "id"=>$id
    ]);
}
    $id = (int)$params["id"];

    $pdo = Connection::getInstancePdo();
    $statement = $pdo->prepare("SELECT * FROM etudiant WHERE id_etudiant = :id");
    $etudiant = $statement->execute(['id'=>$id]);
    $etudiant = $statement->fetch(PDO::FETCH_ASSOC);

$form = new Formulaire($etudiant);

?>



<h1>modifier un etudiant </h1>

<form action="" method="get"> 
    <?=  $form->input( "nom", "nom :"); ?>
    <?=  $form->input( "prenom", "prenom :"); ?>
    <?=  $form->input( "ville_naissance", "ville de naissance :"); ?>
    <?=  $form->input( "matricule", "numero matricule :"); ?>
    <?=  $form->input( "date_naissance", "date de naissance :"); ?>
    <?= $form->putBtn("submit", "primary","enregistrer")?>
</form>
   

