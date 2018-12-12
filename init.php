<?php
/**
 * init.php -- initialisation file
 *
 *
 *
 * @copyright 2018- Zero Framework (c)
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License GPL3
 * @version $Id: init.php 2018-08-19 $
 * 
 */
 
define('ROOTPATH', __DIR__);
define('CURRENT', '.');


require_once(ROOTPATH . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'Path.php');
require_once(ROOTPATH . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'DB.php');
require_once(ROOTPATH . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'User.php');

include 'config.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'library/Data.php';
require_once 'library/AnalyseUni.php';