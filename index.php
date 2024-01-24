<?php

require_once "vendor\autoload.php";

define ("ROOT_URL", "127.0.0.1:5000");

use Msifpt\Wd18302Php2TongChiNhan\Core\Route;

new Route;
$route -> renderController();