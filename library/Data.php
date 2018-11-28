<?php

/**
 * Class DATA
 * 
 * @author Adrien Lafage
 * @date 27/11/18
 * @description
 * Classe modélisant des données.
 * 
 * @TODO: fonctions mathématiques
 * @FIXME: nothing to fix
 */
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

    /**
     * Forme une liste des valeurs pour une unique variable dans une liste de listes
     * 
     * @param integer $index L'index de la variable à extraire dans la sous-liste.
     * @return array La liste par rapport à une variable.
     */
    public function minimize(int $index)
    {
        $data = $this->getData();
        $output = array();

        foreach ($data as $element) {
            $output[] = $element[$index];
        }

        return $output;
    }

    /**
     * Calcule la moyenne d'une liste de listes
     * 
     * @param integer $index L'index de la variable à traiter dans la sous-liste.
     * @return float La moyenne du dataset.
     */
    public function average(int $index)
    {
        $data = $this->minimize($index); // on récupère le dataset
        $output = array_sum($data)/count($data); // on calcule la moyenne
        
        return $output;
    }

    /**
     * Calcule la variance d'une variable dans une liste de listes
     * 
     * @param integer $index L'index de la variable à traiter dans la sous-liste.
     * @return float La variance de la variable.
     */
    public function variance(int $index)
    {
        $data = $this->minimize($index);
        $average = $this->average($index);
        $length = count($data);

        $output = 0;

        for ($i=0; $i < $length; $i++) { 
            $output += pow($data[$i]-$average, 2);
        }

        $output = (1/$length)*$output;

        return $output;
    }

    /**
     * Calcule l'écart-type d'une variable dans une liste de listes
     * 
     * @param integer $index L'index de la variable à traiter dans la sous-liste.
     * @return float L'écart-type de la variable.
     */
    public function deviation(int $index)
    {
        $output = $this->variance($index);
        $output = pow($output, 0.5);
        return $output;
    }
}
