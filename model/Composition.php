<?php
/**
 * Classe Composition
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class Composition
{
    /**
     * @param integer $_idCommande L'identifiant de la commande
     */
    protected $_idCommande;

    /**
     * @param integer $_idArticle l'identifiant de l'article
     */
    protected $_idArticle;

    /**
     * @param float $_marge La marge effectuée sur l'article
     */
    protected $_marge;

    /**
     * Initialise l'objet Composition
     * 
     * @param integer $idCommande L'identifiant de la commande
     * @param integer $idArticle L'identifiant de l'article
     * @param float $marge La marge effectuée sur l'article 
     * lors de la commande
     */
    public function __construct($idCommande, $idArticle, $marge)
    {
        $this->_idCommande = $idCommande;
        $this->_idArticle = $idArticle;
        $this->_marge = $marge;
    }

    /**
     * Retourne l'identifiant de la commande de l'objet Composition
     * 
     * @return integer L'identifiant de la commande de la composition
     */
    public function getIdCommande()
    {
        return $this->_idCommande;
    }

    /**
     * Retourne l'identifiant de l'article de l'objet Composition
     * 
     * @return integer L'identifiant de l'article de la composition
     */
    public function getIdArticle()
    {
        return $this->_idArticle;
    }

    /**
     * Retourne la marge effectuée de l'objet Composition
     * 
     * @return float La marge effectuée de la composition
     */
    public function getMarge()
    {
        return $this->_marge;
    }
}