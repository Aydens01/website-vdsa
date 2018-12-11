<?php
/**
 * Classe Commande
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class Commande
{
    /**
     * @param integer $_id L'identifiant de l'entité
     */
    protected $_id;

    /**
     * @param string $_date La date d'achat de la commande
     */
    protected $_date;

    /**
     * @param integer $_codePostal TODO:
     */
    protected $_codePostal;

    /**
     * @param string $_ville TODO:
     */
    protected $_ville;

    /**
     * @param float $_margeTotale La marge totale effectuée 
     * sur la commande
     */
    protected $_margeTotale;

    /**
     * @param float $_chiffreAffaire Le chiffre d'affaire 
     * obtenu avec la commande
     */
    protected $_chiffreAffaire;

    /**
     * @param integer $_idUser L'identifiant de l'utilisateur 
     * de la session
     */
    protected $_idUser;
    
    /**
     * Initialise l'objet Commande
     * 
     * @param integer $id L'identifiant de la commande
     * @param string $date La date de la commande
     * @param integer $codePostal Le code postal
     * @param string $ville La ville où a été effectuée la commande
     * @param float $margeTotale La marge totale faite sur la commande
     * @param float $chiffreAffaire Le chiffre d'affaire 
     * @param integer $idUser L'identifiant du respo de la commande
     */
    public function __construct($id, $date, $codePostal, $ville, $margeTotale, $chiffreAffaire, $idUser)
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_codePostal = $codePostal;
        $this->_ville = $ville;
        $this->_margeTotale = $margeTotale;
        $this->_chiffreAffaire = $chiffreAffaire;
        $this->_idUser = $idUser;
    }

    /**
     * Retourne l'id de l'objet Commande
     * 
     * @return integer l'identifiant de la commande
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Retourne la date de l'objet Commande
     * 
     * @return string La date de la commande
     */
    public function getDate()
    {
        return $this->_date;
    }
    
    /**
     * Retourne le code postal de l'objet Commande
     * 
     * @return integer La code postal de la commande
     */
    public function getCodePostal()
    {
        return $this->_codePostal;
    }

    /**
     * Retourne la ville de l'objet Commande
     * 
     * @return string La ville de la commande 
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * Retourne la marge totale de l'objet Commande
     * 
     * @return float La marge totale de la commande
     */
    public function getMargeTotale()
    {
        return $this->_margeTotale;
    }

    /**
     * Retourne la chiffre d'affaire de l'objet Commande
     * 
     * @return float Le chiffre d'affaire de la commande
     */
    public function getChiffreAffaire()
    {
        return $this->_chiffreAffaire;
    }

    /**
     * Retourne l'identifiant du responsable de l'objet Commande
     * 
     * @return integer L'identifiant du responsable de la commande
     */
    public function getIdUser()
    {
        return $this->_idUser;
    }
}