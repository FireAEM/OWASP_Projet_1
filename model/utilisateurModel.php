<?php

include_once('bdd.php');

class utilisateurModel {
    private $bdd;

    function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function addUtilisateur($nom, $prenom, $email, $mot_de_passe, $id_role_utilisateur)
    {
        $stmt = $this->bdd->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, id_role_utilisateur) VALUES (:nom, :prenom, :email, :mot_de_passe, :id_role_utilisateur)");
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
        $stmt->bindParam(':id_role_utilisateur', $id_role_utilisateur, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUtilisateurById($id_utilisateur)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
        $stmt->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUtilisateurByEmail($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
}
