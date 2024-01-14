<?php
namespace Php2\Oop\Core;
    class Base{
        const VAT = 0.1;
        public $_name = "PHP2";

        public function getName() {
            return $this ->_name;
        }
        public function setName($language){
            echo self::VAT . "<br />";
            $this ->_name = $language;
        }
        public static function getVAT(){
            return self::VAT;
        }
        
    }
?>