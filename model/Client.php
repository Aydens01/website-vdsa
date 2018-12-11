<?php
/**
 * Classe Client
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class Client
{
    /**
     * @param integer $_code Le code unique associé à un client
     */
    protected $_code;

    /**
     * @param integer $_codePostal Le code postal du client
     */
    protected $_codePostal;

    /**
     * @param string $_ville La ville de résidence du client
     */
    protected $_ville;

    /**
     * @param integer $_idUser L'identifiant de l'utilisateur
     */
    protected $_idUser;

    /**
     * Initialise la classe Client
     * 
     * @param integer $code L'identifiant du client
     * @param integer $codePostal Le code postal du client
     * @param string $ville La ville de résidence du client
     * @param integer $idUser L'identifiant du responsable client
     */
    public function __construct($code, $codePostal, $ville, $idUser)
    {
        $this->_code = $code;
        $this->_codePostal = $codePostal;
        $this->_ville = $ville;
        $this->$_idUser = $idUser;
    }

    /**
     * Retourne le code d'identification de l'objet Client
     * 
     * @return integer Le code client
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * Retourne le code postal de l'objet Client
     * 
     * @return integer Le code postal du client
     */
    public function getCodePostal()
    {
        return $this->_codePostal;
    }

    /**
     * Retourne la ville de l'objet Client
     * 
     * @return string La ville du client
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * Retourne l'identifiant du responsable de l'obet Client
     * 
     * @return integer L'identifiant du responsable client
     */
    public function getIdUser()
    {
        return $this->_idUser;
    }
}
