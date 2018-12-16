<?php
/**
 * Data.php -- define Data class
 * 
 * @author Adrien Lafage
 * @since 27/11/18
 * @description
 * Classe modélisant des données.
 * 
 * @TODO: fonctions mathématiques
 * 
 * @FIXME
 */

# Functions required
require('stats.php');


class Data
{
    /**
     * @param array $_data Le dataset.
     */
    protected $_data;

    /**
     * Initialise l'objet Data
     * 
     * @param array $data Le dataset.
     */
    public function __construct($data)
    {
        $this->_data = $data;
    }

    /**
     * Retourne le dataset de l'objet Data
     * 
     * @return array Le dataset.
     */
    public function getData()
    {
        return $this->_data;
    }
    
    /**
     * Édite le dataset de l'objet Data
     * 
     * @param array $data Un nouveau dataset.
     * @return self L'objet Data modifié.
     */
    public function setData(array $data)
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * Supprime une donnée du dataset à l'aide de son index
     * 
     * @param integer $index L'index de la donnée à supprimer
     * @return self L'objet Data modifié
     */
    public function delData(int $index)
    {
        // On supprime l'élément
        unset(($this->_data)[$index]);
        $this->_data = array_values($this->_data);
        return $this;
    }

    public function unicity(int $index)
    {
        $output = array();
        $data_x = minToOne($this->getData(), $index);
        $length = count($data_x);

        for ($i=0; $i < $length; $i++) { 
            if (!in_array($data_x[$i], $output)) {
                array_push($output, $data_x[$i]);
            }
        }

        return $output;
    }
}
