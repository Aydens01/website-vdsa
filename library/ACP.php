<?php
/**
 * ACP.php -- define ACP class
 * 
 * @author Adrien Lafage
 * @since 11.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class AnalyseCP extends Data
{
    /**
     * @param array $_corlinear_matrix La matrice des corrélations linéaires
     */
    protected $_corlinear_matrix;

    /**
     * Initialise l'objet ACP
     * 
     * @param array $data Le dataset
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->_corlinear_matrix = corLinearMatrix($data);
    }

    /**
     * Retourne la matrice de corrélation linéaire
     * 
     * @return array La matrice de corrélation linéaire
     */
    public function getCorlinearMatrix()
    {
        return $this->_corlinear_matrix;
    }
}