<?php
/**
 * ANALYSE BIVARIÉE QUANTITATIF x QUANTITATIF
 * 
 * @author Adrien Lafage
 * @since 27.11.18
 * @description
 * Classe permettant d'effectuer une analyse bivariée quandtitatif x quantitatif
 * sur un jeu de données.
 * 
 * @TODO
 * 
 * @FIXME
 */

# Functions required
# require('stats.php');

class AnaQuanQuan extends Data
{
    /**
     * @param integer $_index_x L'index dans la sous-liste de la première variable.
     */
    protected $_index_x;

    /**
     * @param integer $_index_y L'index dans la sous-liste de la seconde variable.
     */
    protected $_index_y;

    /**
     * @param float $_variance_x La variance de la première variable.
     */
    protected $_variance_x;

    /**
     * @param float $_variance_y La variance de la seconde variable.
     */
    protected $_variance_y;

    /**
     * @param float $_covariance La covariance entre les deux variables.
     */
    protected $_covariance;

    /**
     * @param float $_pearson Le coefficient de pearson entre les deux variables.
     */
    protected $_pearson;

    /**
     * Construit la classe selon la construction de Data
     * 
     * @param array $data Le dataset (liste de listes).
     * @param integer $index_x L'index dans la sous-liste de la première variable étudiée.
     * @param integer $index_y L'index dans la sous-liste de la seconde variable étudiée.
     */
    public function __construct($data, $index_x, $index_y)
    {
        parent::__construct($data);
        $this->_index_x    = $index_x;
        $this->_index_y    = $index_y;
        $this->_variance_x = variance(minToOne($this->getData(), $index_x));
        $this->_variance_y = variance(minToOne($this->getData(), $index_y));
        $this->_covariance = covariance(minToTwo($this->getData(),$index_x,$index_y));
        $this->_pearson    = pearson(minToTwo($this->getData(), $index_x, $index_y));
    }

    /**
     * Retourne l'index dans la sous-liste de la première variable étudiée
     * 
     * @return integer L'index de la première variable.
     */
    public function getIndex_x()
    {
        return $this->_index_x;
    }

    /**
     * Retourne l'index dans la sous-liste de la seconde variable étudiée
     * 
     * @return integer L'index de la seconde variable.
     */
    public function getIndex_y()
    {
        return $this->_index_y;
    }

    /**
     * Retourne la vatiance de la première variable
     * 
     * @return float La variance de la première variable.
     */
    public function getVariance_x()
    {
        return $this->_variance_x;
    }

    /**
     * Retourne la vatiance de la seconde variable
     * 
     * @return float La variance de la seconde variable.
     */
    public function getVariance_y()
    {
        return $this->_variance_y;
    }

    /**
     * Retourne la covariance entre les deux variables étudiées
     * 
     * @return float La covariance entre les deux variables.
     */
    public function getCovariance()
    {
        return $this->_covariance;
    }

    /**
     * Retourne le coefficient de pearson entre les deux variables étudiées
     * 
     * @return float Le coefficient de pearson entre les deux variables;
     */
    public function getPearson()
    {
        return $this->_pearson;
    }
}