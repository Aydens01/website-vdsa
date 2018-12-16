<?php
/**
 * AnaQualQuan.php -- define AnaQualQuan class
 * 
 * @author Adrien Lafage
 * @since 12.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
*/

# Functions required
# require('stats.php');

class AnaQualQuan extends Data
{
    /**
     * @param integer $_index_x L'index dans la variable qualitative dans la sous-liste
     */
    protected $_index_x;

    /**
     * @param integer $_index_y L'index de la varible quantitative dans la sous-liste
     */
    protected $_index_y;

    /**
     * @param float $_average La moyenne de la variable quantitative
     */
    protected $_average;

    /**
     * @param float $_var_intra La variation intra de l'objet AnaQualQuan
     */
    protected $_var_intra;

    /**
     * @param float $_var_inter La variation inter de l'objet AnaQualQuan
     */
    protected $_var_inter;

    /**
     * @param float $_var_totale La variation totale de l'objet AnaQualQuan
     */
    protected $_var_totale;

    /**
     * @param float $_rpcorrel Le rapport de corrélation de l'objet AnaQualQuan
     */
    protected $_rpcorrel;

    /**
     * Initialise l'objet AnaQualQuan
     * 
     * @param array $data Le dataset (liste de listes)
     * @param integer $index_x L'index de la variable qualitative dans la sous-liste
     * @param integer $index_y L'index de la variable quantitative dans la sous-liste
     */
    public function __construct($data, $index_x, $index_y)
    {
        parent::__construct($data);
        $this->_index_x    = $index_x;
        $this->_index_y    = $index_y;
        $this->_average    = average(minToOne($this->getData(), $index_y));
        $this->_var_intra  = $this->variationIntra();
        $this->_var_inter  = $this->variationInter();
        $this->_var_totale = $this->variationTotal();
        $this->_rpcorrel   = $this->rpCorrel();

    }

    /**
     * Retourne l'index dans la sous-liste de la variable qualitative
     * 
     * @return integer L'index de la variable qualitative.
     */
    public function getIndex_x()
    {
        return $this->_index_x;
    }

    /**
     * Retourne l'index dans la sous-liste de la variable quantitative
     * 
     * @return integer L'index de la variable quantitative.
     */
    public function getIndex_y()
    {
        return $this->_index_y;
    }

    /**
     * Retourne la moyenne de la variable quantitative
     * 
     * @return float La moyenne de la variable quantitative
     */
    public function getAverage()
    {
        return $this->_average;
    }

    /**
     * Retourne la variation intra
     * 
     * @return float La variation intra
     */
    public function getVar_intra()
    {
        return $this->_var_intra;
    }

    /**
     * Retourne la variation inter
     * 
     * @return float La variation inter
     */
    public function getVar_inter()
    {
        return $this->_var_inter;
    }

    /**
     * Retourne la variation totale
     * 
     * @return float La variation totale
     */
    public function getVar_total()
    {
        return $this->_var_totale;
    }

    /**
     * Retourne le rapport de corrélation
     * 
     * @return float Le rapport de corrélation
     */
    public function getRpcorrel()
    {
        return $this->_rpcorrel;
    }

    /**
     * Retourne une liste de valeurs d'une variable qualitative
     * 
     * @param integer $index L'index de la variable à extraire
     * @param string $pattern La valeur de la variable qualitative
     */
    public function gather(string $pattern)
    {
        $output = array();

        $data_x = minToOne($this->getData(), $this->getIndex_x());
        $data_y = minToOne($this->getData(), $this->getIndex_y());
        $length = count($data_x);

        for ($i=0; $i < $length; $i++) {
            if ($data_x[$i]==$pattern) {
                array_push($output, $data_y[$i]);
            }
        }

        return $output;
    }

    /**
     * Calcule la variation intra
     * 
     * @return float La variation intra
     */
    public function variationIntra()
    {
        $output = 0;
        $index_x = $this->getIndex_x();
        $data = $this->getData();
        $data_x = $this->unicity($index_x);
        $length_x = count($data_x);

        for ($i=0; $i < $length_x; $i++) {
            # Les valeurs d'une sous-population
            $data_y = $this->gather($data_x[$i]);
            $n = count($data_y);
            $output += $n*variance($data_y);
        }
        
        $output = (1/count($data))*$output;
        
        return $output;
    }

    /**
     * Calcule la variation inter
     * 
     * @return float La variation inter
     */
    public function variationInter()
    {
        $output = 0;
        $index_x = $this->getIndex_x();
        $data = $this->getData();
        $data_x = $this->unicity($index_x);
        $length_x = count($data_x);

        for ($i=0; $i < $length_x; $i++) { 
            $data_y = $this->gather($data_x[$i]);
            $n = count($data_y);
            $output += $n*pow(average($data_y)-$this->getAverage(),2);
        }

        $output = (1/count($data))*$output;

        return $output;
    }

    /**
     * Calcule la variation totale
     * 
     * @return float La variation totale
     */
    public function variationTotal()
    {
        return ($this->getVar_inter())+($this->getVar_intra()); 
    }

    /**
     * Calcule le rapport de corrélation entre la variable qualitative et quantitative
     * 
     * @return float Le rapport de corrélation
     */
    public function rpCorrel()
    {
        return ($this->getVar_inter())/($this->getVar_total());
    }
}