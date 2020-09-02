<?php
namespace app;

class Etudiant
{
    private $id_etudiant;

    private $nom;

    private $prenom;

    private $ville_naissance;

    private $date_naissance;

    private $matricule;


    /**
     * Get the value of id_etudiant
     */ 
    public function getId_etudiant()
    {
        return $this->id_etudiant;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Get the value of ville_naissance
     */ 
    public function getVille_naissance()
    {
        return $this->ville_naissance;
    }

    /**
     * Get the value of date_naissance
     */ 
    public function getDate_naissance()
    {
        return $this->date_naissance;
    }

    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }
}