<?php
/**
 * Classe Famille
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class Famille
{
    /**
     * @param integer $_codeFamille l'identifiant de l'objet Famille
     */
    protected $_codeFamille;

    /**
     * @param string $_libFamille Le libelé de l'objet Famille
     */
    protected $_libFamille;

    /**
     * Initialise la classe Famille
     * 
     * @param integer $codeFamille
     * @param string $libFamille
     */
    public function __construct($codeFamille, $libFamille)
    {
        $this->_codeFamille = $codeFamille;
        $this->_libFamille = $libFamille;
    }

    /**
     * Retourne l'identifiant de l'objet Famille
     * 
     * @return integer L'identifiant de la famille
     */
    public function getCodeFamille()
    {
        return $this->_codeFamille;
    }

    /**
     * Retourne le libelé de l'objet Famille
     * 
     * @return string Le libelé de la famille 
     */
    public function getLibFamille()
    {
        return $this->_libFamille;
    }
}