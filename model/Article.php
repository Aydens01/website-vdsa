<?php
/**
 * Classe Article
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class Article
{
    /**
     * @param integer $_id L'identifiant de l'objet Article
     */
    protected $_id;

    /**
     * @param string $_dateAchat La date d'achat de l'objet Article
     */
    protected $_dateAchat;

    /**
     * @param integer $_codeFamille L'identifiant de la famille de l'objet Article
     */
    protected $_codeFamille;

    /**
     * Initialise l'objet Article
     * 
     * @param integer $id L'identifiant de l'objet Article
     * @param string $dateAchat La date d'achat de l'objet Article
     * @param integer $codeFamille L'identifiant de la famille de 
     * l'objet Article
     */
    public function __construct($id, $dateAchat, $codeFamille)
    {
        $this->_id = $id;
        $this->_dateAchat = $dateAchat;
        $this->_codeFamille = $codeFamille;
    }

    /**
     * Retourne l'identifiant de l'objet Article
     * 
     * @return integer L'identifiant de l'article
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Retourne la date d'achat de l'objet Article
     * 
     * @return string La date d'achat de l'article
     */
    public function getDateAchat()
    {
        return $this->_dateAchat;
    }

    /**
     * Retourne l'identifiant de la famille de l'objet Article
     * 
     * @return integer L'identifiant de la famille de l'article
     */
    public function getCodeFamille()
    {
        return $this->_codeFamille;
    }
}