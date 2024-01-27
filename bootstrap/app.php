<?php

define('ROOT', dirname(__DIR__));
const VIEW_PATH = ROOT.'/views';
const DB_CONFIG_FILE = ROOT.'/config/db.php';
const ROUTER_PATH = ROOT.'/config/routes.php';
const MEDIA = '/storage';
define('STORAGE', $_SERVER['DOCUMENT_ROOT'].MEDIA);

require_once __DIR__.'/Autoloader.php';

(new Core\App())->run();

