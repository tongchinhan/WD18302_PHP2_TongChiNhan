<?php
require_once "vendor/autoload.php";

use Php2\Oop\Core\Database;
use Php2\Oop\Core\Route;
use Php2\Oop\Controller\BaseController;
use Php2\Oop\Model\BaseModel;
use Php2\Oop\Model\Product;
use Php2\Oop\Core\Base;

$data = new Database();
$tcnmodel = new BaseModel();
$tcnvip = new BaseController();
$tcnn = new Route();
$book = new Product();
$base = new Base();
    var_dump($base);
    echo $data ->getName() . "<br/>";

    echo $tcnn ->getTCNNN() . "<br/>";
 
    echo $tcnvip -> getnhantong() . "<br/>";

    echo $tcnmodel -> getModel(). "<br/>"; 
    
    // echo $base ->_name;
    echo $base ->getName(). "<br/>";
     $base ->setName("Javascript");
    echo $base->getName(). "<br/>";
    
?>
