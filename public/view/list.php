<?php

use app\Connection;
use app\Etudiant;
use app\Router;

const PER_PAGE = 20;

$pdo = Connection::getInstancePdo();

$currentPage =(int)($_GET['p']?? 1);
if ($currentPage<=0 )
{
    throw  new Exception("le page est <= 0");
    exit();
}

$ofset = ($currentPage-1) * PER_PAGE;

$queryResultat = "SELECT * FROM etudiant ";
$queryCount = "SELECT COUNT(id_etudiant) as count FROM etudiant";
$params =  [];

if(!empty($_GET['q'])){
    $queryResultat .=" WHERE date_naissance LIKE :naiss";
    $queryCount .= " WHERE date_naissance LIKE :naiss";
    $params["naiss"]= "%".$_GET['q']."%";
};
$queryResultat.= " LIMIT ". PER_PAGE . " OFFSET $ofset";


$statement = $pdo->prepare($queryResultat);
$statement->execute($params);
$etudiants = $statement->fetchAll(PDO::FETCH_CLASS,Etudiant::class);

$statement = $pdo->prepare($queryCount);
$statement->execute($params);
$count = $statement->fetch()["count"];

$pages =ceil($count/PER_PAGE);
if($pages == 0){
    $pages = 1;
}
if ($currentPage > $pages )
{
    throw  new Exception("le page est plus ");
   exit();
}

?>

<div class="row">
        <div class="col-md-4">
            <h1>tout les donnes :</h1>
        </div>
        <div class="col-md-8">
            <div class="container mt-2">
                <form action="">
                    <div class="form-inline text-right  align-items-end">
                        <input value="<?=htmlentities($_GET['q']?? null )?>" type="text" name="q" class="form-control d-flex" placeholder="recherche par date">
                        <button class="btn btn-outline-primary ml-3">recherche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<table class=" table ">
    <thead>
        <tr>
            <th>#ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>VILLE NAISSANCE</th>
            <th>DATE DE NAISSANCE</th>
            <th>MATRICULE</th>
            <th>ACTION <a href="<?=$Router->Url("add") ?>" class="btn btn-primary py-1 my-0">add</a> </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($etudiants as $etudiant) : ?>
        <tr>
            <td>#<?=$etudiant->getId_etudiant() ?></td>
            <td><?=$etudiant->getNom() ?></td>
            <td><?=$etudiant->getPrenom() ?></td>
            <td><?=$etudiant->getVille_naissance() ?></td>
            <td><?=$etudiant->getDate_naissance() ?></td>
            <td><?=$etudiant->getMatricule() ?></td>
            <td>
                <a href="<?=$Router->Url('edite',["id"=>$etudiant->getId_etudiant()])?>" class="btn btn-primary">edite</a>
                <a href="<?=$Router->Url("delete",["id"=>$etudiant->getId_etudiant()])?>" class="btn btn-danger">delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    
</table>
<p>pages <?=$currentPage?>/<?=$pages?></p>

<p>
    <?php if ($currentPage>1 && $pages>1): ?>
    <a href="?<?=http_build_query( array_merge($_GET,["p"=>$currentPage-1]))?>" class="btn btn-primary">precedant</a>
    <?php endif ?>
    <?php if ($currentPage<$pages && $pages>1): ?>
    <a href="?<?=http_build_query( array_merge($_GET,["p"=>$currentPage+1]))?>" class="btn btn-primary" >suivant</a>
    <?php endif ?>
</p>

   