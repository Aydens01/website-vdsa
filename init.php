<?php
define('ROOTPATH', __DIR__);

define('CURRENT', '.');

// =============================================================================

require_once(ROOTPATH . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'Path.php');
require_once(ROOTPATH . DIRECTORY_SEPARATOR. 'model' . DIRECTORY_SEPARATOR . 'DB.php');

include 'config.php';
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'library/Data.php';
require_once 'library/AnalyseUni.php';