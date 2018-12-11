<?php

/**
 * ANALYSE BIVARIÉE
 * 
 * @author Adrien Lafage
 * @since 27.11.18
 * @description
 * Classe permettant d'effectuer une analyse bivariée quandtitative x quantitative
 * sur un jeu de données.
 * 
 * @TODO
 * 
 * @FIXME
 */
class AnalyseBiv extends Data
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
        parent::__construct($data, $index_x, $index_y);
        $this->_index_x    = $index_x;
        $this->_index_y    = $index_y;
        $this->_covariance = $this->covariance($index_x, $index_y);
        $this->_pearson    = $this->pearson($index_x, $index_y);
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

    /**
     * Calcule la covariance entre deux variables dans une liste de listes
     * 
     * @param integer $index_x L'index de la première variable dans la sous-liste.
     * @param integer $index_y L'index de la seconde variable dans la sous-liste.
     * @return float La covariance entre les deux variables.
     */
    public function covariance(int $index_x, int $index_y)
    {
        $data_x = $this->minimize($index_x);
        $average_x = $this->average($index_x);
        $data_y = $this->minimize($index_y);
        $average_y = $this->average($index_y);
        $length = count($data_x);

        $output = 0;

        for ($i=0; $i < $length; $i++) { 
            $output += ($data_x[$i]-$average_x)*($data_y[$i]-$average_y);
        }
        $output = (1/$length)*$output;

        return $output;
    }

    /**
     * Calcule le coefficient de pearson entre deux variables dans une liste de listes
     * 
     * @param integer $index_x L'index de la première variable dans la sous-liste.
     * @param integer $index_y L'index de la seconde variable dans la sous-liste.
     * @return float Le coefficient de pearson entre les deux variables.
     */
    public function pearson(int $index_x, int $index_y)
    {
        $covariance = $this->covariance($index_x, $index_y);
        $deviation_x = $this->deviation($index_x);
        $deviation_y = $this->deviation($index_y);

        $output = $covariance/($deviation_x*$deviation_y);

        return $output;
    }
}