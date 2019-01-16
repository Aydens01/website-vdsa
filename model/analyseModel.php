<?php
/**
 * Analyse.php -- DB class
 * 
 * @author Lafage Adrien
 * @since 16.12.18
 * @description
 * 
 * @TODO
 * 
 * @FIXME
 */
class analyseModel extends DB
{
    /**
     * Récupère les données pour une analyse univariée
     * 
     * @param string $column Le nom de la variable à étudier
     * @param string $table Le nom de la table de données
     * @return array Le vecteur de données
     */
    function univar(string $column, string $table)
    {
        $output = array();

        $conn = $this->DBconnect();
        $request = 'SELECT '.$column.' FROM '.$table;
        $response = $conn->query($request);
        if ($response != null) {
            while ($row = $response->fetch()) {
                $output[]=array($row[$column]);
            }
        }else{
            $output = array(array('FAIL'));
        }
        $response = null;
        $conn = null;

        return $output;
    }

    /**
     * Récupère les données pour une analyse bivariée
     * 
     * @param string $column1 le nom de la première variable
     * @param string $column2 Le nom de la seconde variable
     * @param string $table Le nom de la table de données
     * @return array La matrice de donnée M(n,2)
     */
    function bivar(string $column1, string $column2, string $table)
    {
        $output = array();

        $conn = $this->DBconnect();
        //$request = 'SELECT '.$column1.', '.$column2.' FROM '.$table;
        $request = 'SELECT '.$column1.' , '.$column2.' FROM '.$table;
        $response = $conn->query($request);
        if ($response != null) {
            while ($row = $response->fetch()) {
                $output[]=array($row[$column1], $row[$column2]);
            }
        }else{
            $output = array(array('FAIL'));
        }
        $response = null;
        $conn = null;

        return $output;
    }
}