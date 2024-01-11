<?php
require_once "vendor/autoload.php";

use Php2\Oop\Core\Database;
use Php2\Oop\Core\Route;
use Php2\Oop\Controller\BaseController;
use Php2\Oop\Model\BaseModel;

$data = new Database();
$tcnmodel = new BaseModel();
$tcnvip = new BaseController();
$tcnn = new Route();
    echo $data ->getName() . "<br/>";

    echo $tcnn ->getTCNNN() . "<br/>";
 
    echo $tcnvip -> getnhantong() . "<br/>";

    echo $tcnmodel -> getModel();
?>
