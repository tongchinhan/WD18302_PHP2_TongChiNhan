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
    echo $data ->getName();
    echo "<br/>";
    echo $tcnn ->getTCNNN();
    echo "<br/>";
    echo $tcnvip -> getnhantong();
    echo "<br/>";
    echo $tcnmodel -> getModel();
?>
