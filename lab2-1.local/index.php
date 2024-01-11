<?php
require_once "vendor/autoload.php";

use Php2\Oop\Core\Database;
use Php2\Oop\Core\Route;
use Php2\Oop\Controller\BaseController;
use Php2\Oop\Model\BaseModel;

$data = new Database();
    echo $data ->getName();
    echo "<br/>";
$tcnn = new Route();
    echo $tcnn ->getTCNNN();
    echo "<br/>";
$tcnvip = new BaseController();
    echo $tcnvip -> getnhantong();
    echo "<br/>";
$tcnmodel = new BaseModel();
    echo $tcnmodel -> getModel();
?>
