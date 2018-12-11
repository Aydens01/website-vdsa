<?php
/**
 * Classe SousFamille
 * 
 * @author Adrien Lafage
 * @date 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class SousFamille
{
    /**
     * @param integer $_codeSfam L'identifiant de l'objet SousFamille  
     */
    protected $_codeSfam;

    /**
     * @param string $_libSfam Le libelé de l'objet SousFamille
     */
    protected $_libSfam;

    /**
     * @param integer $_codeFamille L'identifiant de la famille de
     * l'objet SousFamille
     */
    protected $_codeFamille;

    /**
     * Initialise l'objet SousFamille
     * 
     * @param integer $codeSfam L'identifiant de l'objet SousFamille 
     * @param string $libSfam Le libelé de l'objet SousFamille
     * @param integer $codeFamille L'identifiant de la famille de l'objet SousFamille
     */
    public function __construct($codeSfam, $libSfam, $codeFamille)
    {
        $this->_codeSfam = $codeSfam;
        $this->_libSfam = $libSfam;
        $this->_codeFamille = $codeFamille;
    }

    /**
     * Retourne l'identifiant de l'objet SousFamille
     * 
     * @return integer L'identifiant de la sous-famille
     */
    public function getCodeSfam()
    {
        return $this->_codeSfam;
    }

    /**
     * Retourne le libelé de l'objet SousFamille
     * 
     * @return string Le libelé de la sous-famille
     */
    public function getLibSfam()
    {
        return $this->_libSfam;
    }

    /**
     * Retourne l'identifiant de la famille de l'objet SousFamille
     * 
     * @return integer L'identifiant de la famille de la sous-famille
     */
    public function getCodeFamille()
    {
        return $this->_codeFamille;
    }
}