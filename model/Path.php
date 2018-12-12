<?php
/**
 * Path.php -- Path class
 * 
 * @author Dorian Chau
 * @date 19.06.18
 * @description
 *  Legacy functions, used in the old versions of the Zero Framework (c) NOTE still used
 * @TODO Move Path.php to /core/
 * 
 * @FIXME
 */
class Path {

    public static function make_path($array) {
        $root = ROOTPATH;
        $sep = DIRECTORY_SEPARATOR;

        $url = $root;
        foreach($array as $value) {
            $url .= $sep . $value;
        };
        return $url;
    }

    public static function make_url($array) {
        
        $sep = DIRECTORY_SEPARATOR;

        $file = $array[0];
        $get = $array[1];

        $url = '';
        foreach($file as $value) {
            $url .= $sep . $value;
        };

        if (isset($get) && !empty($get)) {
            $url .= '?';
            foreach($get as $key => $value) {
                $url .= $key . '=' . $value . '&';
            };
        };

        return $url;
    }

    public static function controller($array) {
        $root = ROOTPATH;
        $sep = DIRECTORY_SEPARATOR;

        $url = $root . $sep . 'controller';
        foreach($array as $value) {
            $url .= $sep . $value;
        };
        return($url);
    }

    public static function view($array) {
        $root = ROOTPATH;
        $sep = DIRECTORY_SEPARATOR;

        $url = $root . $sep . 'view';
        foreach($array as $value) {
            $url .= $sep . $value;
        };
        return($url);
    }

    public static function asset($array) {
        $sep = DIRECTORY_SEPARATOR;

        $url =  $sep . CURRENT . $sep ;
        foreach($array as $value) {
            $url .= $sep . $value;
        };
        return($url);
    }

    public static function model($array) {
        $root = ROOTPATH;
        $sep = DIRECTORY_SEPARATOR;
        
        $url = $root . $sep . 'model';
        foreach($array as $value) {
            $url .= $sep . $value;
        };
        return($url);
    }

}