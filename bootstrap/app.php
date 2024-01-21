<?php

define('ROOT', dirname(__DIR__));
const VIEW_PATH = ROOT.'/views';
const DB_CONFIG_FILE = ROOT.'/config/db.php';
const ROUTER_PATH = ROOT.'/config/routes.php';
require_once __DIR__.'/Autoloader.php';

(new Core\App())->run();

