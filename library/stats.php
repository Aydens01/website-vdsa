<?php

/**
 * Forme une liste des valeurs pour une unique variable dans une liste de listes
 * 
 * @param array La matrice de valeurs d'origine
 * @param integer $index L'index de la variable à extraire dans la sous-liste.
 * @return array La liste par rapport à une variable.
 */
function minToOne(array $array, int $index)
{
    $output = array();

    foreach ($array as $element) {
        $output[] = $element[$index];
    }

    return $output;
}

/**
 * Forme une liste de couple à partir d'une matrice
 * 
 * @param array La matrice de valeurs d'origine
 * @param integer $index_x L'index de la première variable à extraire
 * @param integer $index_y L'index de la seconde variable à extraire
 * @return array La liste de couples
 */
function minToTwo(array $array, int $index_x, int $index_y)
{
    $output = array();

    foreach ($array as $element) {
        $output[] = array($element[$index_x], $element[$index_y]);
    }

    return $output;
}

/**
 * Calcule la moyenne d'une liste de listes.
 * 
 * @param array $array Une liste de réels à traiter
 * @return float La moyenne du dataset
 */
function average(array $array)
{
    $output = array_sum($array)/count($array); // on calcule la moyenne
    
    return $output;
}

/**
 * Calcule la variance d'une variable dans une liste de listes
 * 
 * @param array $array Le vecteur de données traiter.
 * @return float La variance de la variable.
 */
function variance(array $array)
{
    $length = count($array);
    $average = average($array);
    $output = 0;

    for ($i=0; $i < $length; $i++) { 
        $output += pow($array[$i]-$average, 2);
    }

    $output = (1/$length)*$output;

    return $output;
}

/**
 * Calcule l'écart-type d'une variable dans une liste de listes
 * 
 * @param array $array Le vecteur de données traiter.
 * @return float L'écart-type de la variable.
 */
function deviation(array $array)
{
    $output = variance($array);
    $output = pow($output, 0.5);
    return $output;
}

/**
 * Calcule la covariance entre deux variables dans une matrice
 * 
 * @param array Le vecteur de couple de données
 * @return float La covariance entre les deux variables.
 */
function covariance(array $array)
{
    $data_x = minToOne($array, 0);
    $data_y = minToOne($array, 1);
    $average_x = average($data_x);
    $average_y = average($data_y);
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
 * @param array Le vecteur couple de données
 * @return float Le coefficient de pearson entre les deux variables.
 */
function pearson(array $array)
{
    $data_x = minToOne($array, 0);
    $data_y = minToOne($array, 1);
    $covariance = covariance($array);
    $deviation_x = deviation($data_x);
    $deviation_y = deviation($data_y);

    $output = $covariance/($deviation_x*$deviation_y);

    return $output;
}

/**
 * Calcule la moyenne de chaque variable d'une matrice
 * 
 * @param array $array La matrice de données
 * @return array La matrice des moyennes
 */
function averageVector(array $array)
{
    $output = array();
    $length = count($array[0]);

    for ($i=0; $i < $length; $i++) { 
        $data = minToOne($array, $i);
        $average = average($data);
        array_push($output, $average);
    }

    return $output;
}

/**
 * Calcule la variance de chaque variable d'une matrice
 * 
 * @param array $array La matrice de données
 * @return array Le vecteur des variances
 */
function varianceVector(array $array)
{
    $output = array();
    $length = count($array[0]);

    for ($i=0; $i < $length; $i++) { 
        $data = minToOne($array, $i);
        $average = variance($data);
        array_push($output, $average);
    }
    return $output;
}

/**
 * Calcule l'écart-type de chaque variable d'une matrice
 * 
 * @param array $array La matrice de données
 * @return array Le vecteur d'écart-type
 */
function deviationVector(array $array)
{
    $output = array();
    $length = count($array[0]);

    for ($i=0; $i < $length; $i++) { 
        $data = minToOne($array, $i);
        $average = deviation($data);
        array_push($output, $average);
    }
    return $output;
}

/**
 * Définition de la matrice de variables centrées-réduites
 * 
 * @param array $array La matrice de données
 * @return array La matrice de données centrées-réduites
 */
function centereducedMatrix(array $array)
{
    $output_matrix = array();
    $average_vector = averageVector($array);
    $variance_vector = varianceVector($array);
    $max_i = count($array);
    $max_j = count($array[0]);

    for ($i=0; $i < $max_i; $i++) { 
        $output_vector = array();
        for ($j=0; $j < $max_j; $j++) { 
            $output_vector[] = ($array[$i][$j]-$average_vector[$j])/pow($variance_vector[$j], 0.5);
        }
        $output_matrix[]=$output_vector;
    }

    return $output_matrix;
}

/**
 * Calcule la matrice de corrélation linéaire
 * 
 * @param array Une matrice de réels
 * @return array La matrice de corrélation linéaire
 */
function corLinearMatrix(array $array)
{
    $output_matrix = array();
    $length = count($array[0]);

    for ($i=0; $i < $length; $i++) {
        $output_vector = array(); 
        for ($j=0; $j < $length; $j++) {
            $data = minToTwo($array, $i, $j); 
            $output_vector[]=pearson($data);
        }

        $output_matrix[]=$output_vector;
    }

    return $output_matrix;
}