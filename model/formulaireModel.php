<?php

include_once('bdd.php');

class formulaireModel {
    private $bdd;

    function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function addMessage($nom, $prenom, $email, $contenu)
    {
        $stmt = $this->bdd->prepare("INSERT INTO message (nom, prenom, email, contenu) VALUES (:nom, :prenom, :email, :contenu)");
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getMessages()
    {
        return $this->bdd->query("SELECT * FROM message ORDER BY id_message DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMessageById($id_message)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM message WHERE id_message = :id_message");
        $stmt->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}