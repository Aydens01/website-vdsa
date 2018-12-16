<?php
/**
 * ANALYSE UNIVARIÉE
 * 
 * @author Adrien Lafage
 * @date 27/11/18
 * @description
 * classe permettant de faire une analyse univariée quantitative 
 * sur un set de données.
 * 
 * @TODO: fonctions mathématiques
 *        error manager
 * @FIXME: quartiles()
 */

# Functions required
#require('stats.php');

class AnalyseUni extends Data
{
    /**
     * @param integer $_index L'index de la variable à analyser.
     */
    protected $_index;

    /**
     * @param float $_average La moyenne des valeurs de la variable.
     */
    protected $_average;

    /**
     * @param float $_median La médiane des valeurs de la variable.
     */
    protected $_median;

    /**
     * @param float $_quartile1 Le premier quartile des valeurs de la variable.
     */
    protected $_quartile1;

    /**
     * @param float $_quartile3 Le troisième quartile des valeurs de la variable.
     */
    protected $_quartile3;

    /**
     * @param float $_variance La variance de la variable
     */
    protected $_variance;

    /**
     * @param float $_deviation L'écart-type de la variable
     */
    protected $_deviation;

    /**
     * Effectue l'analyse univariée
     * 
     * @param array $data Le dataset (liste de listes).
     * @param integer $index L'index dans la sous-liste de la variable étudiée.
     */
    public function __construct($data, $index)
    {
        parent::__construct($data);
        $data_x = minToOne($this->getData(), $index);    
        $this->_index     = $index;
        $this->_average   = average($data_x);
        $this->_median    = $this->median($index);
        $quarts           = $this->quartiles($index);
        $this->_quartile1 = $quarts['quart1'];
        $this->_quartile3 = $quarts['quart3'];
        $this->_variance  = variance($data_x);
        $this->_deviation = deviation($data_x);
    }

    /**
     * Retourne l'index de la variable étudiée dans la sous-liste
     * 
     * @return integer L'index de la variable
     */
    public function getIndex()
    {
        return $this->_index;
    }

    /**
     * Retourne la moyenne de l'objet AnalyseUni
     * 
     * @return float La moyenne des valeurs de la variable étudiée.
     */
    public function getAverage()
    {
        return $this->_average;
    }

    /**
     * Retourne la médiane de l'objet AnalyseUni
     * 
     * @return float La médiane des valeurs de la variable étudiée.
     */
    public function getMedian()
    {
        return $this->_median;
    }

    /**
     * Retourne le premier quartile de l'objet AnalyseUni
     * 
     * @return float Le premier quartiles des valeurs de la variable étudiée.
     */
    public function getQuart1()
    {
        return $this->_quartile1;
    }

    /**
     * Retourne le troisième quartile de l'objet AnalyseUni
     * 
     * @return float Le troisième quartiles des valeurs de la variable étudiée.
     */
    public function getQuart3()
    {
        return $this->_quartile3;
    }

    /**
     * Retourne la variance de l'objet AnalyseUni
     * 
     * @return float La variance de la variable étudiée
     */
    public function getVariance()
    {
        return $this->_variance;
    }

    /**
     * Retourne l'écart-type de l'objet AnalyseUni
     * 
     * @return float L'écart-type de la variable étudiée
     */
    public function getDeviation()
    {
        return $this->_deviation;
    }

    /**
     * Trouve la médiane d'une liste de nombres
     * 
     * @param integer $index L'index de la variable à traiter dans la sous-liste.
     * @return float La médiane du dataset.
     */
    public function median(int $index)
    {
        $data  = minToOne($this->getData(), $index);
        $length  = count($data);
        $success = sort($data);

        if ($success) {
            if ($length%2 == 0) {
                $output = $data[($length/2)-1]+$data[$length/2];
                $output = $output/2;
            }else{
                $output = $data[floor($length/2)];
            }
        }else{
            #TODO: error case
        }

        return $output;
    }

    /**
     * Trouve le premier et le troisième quartile d'une liste de nombres
     * 
     * @param integer $index l'index de la variable à traiter dans la sous-liste;
     * @return array Le premier et le troisième quartiles.
     */
    public function quartiles(int $index)
    {
        $data  = minToOne($this->getData(), $index);
        $length  = count($data);
        $success = sort($data);

        if ($success) {
            #FIXME: vérifier les formules.
            if ($length%2==0) {
                $quart1 = ($data[($length/4)-1]+$data[$length/4])/2;
                $quart3 = ($data[(($length*3)/4)-1]+$data[($length*3)/4])/2;
            }else{
                $quart1 = $data[$length/4];
                $quart3 = $data[($length*3)/4];
            }
            
        }else {
            #TODO: error case.
        }

        return array(
            'quart1' => $quart1,
            'quart3' => $quart3,
        );
    }
}

