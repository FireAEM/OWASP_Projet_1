<?php
class Message
{
    private $id_message;
    private $nom;
    private $prenom;
    private $email;
    private $contenu;

    public function __construct($nom, $prenom, $email, $contenu)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->contenu = $contenu;
    }

    public function getIdMessage()
    {
        return $this->id_message;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
}