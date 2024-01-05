<?php 
    include '../Model/data.php';
    function get_course(){
        global $course; // giúp đọc biến 
    
       return array_values($course);
    
    }
    // var_dump(get_course());
    
    function find_by_block($block){
        global $course; 
        // echo $course['$block'];
        return array_key_exists($block, $course)?$course[$block]:"invalid course";
    }
     echo find_by_block("block1");
    
        // $list_of_course = get_course();
        $block = (!empty($_GET['block']))? $_GET['block']: ''; // kiểm tra có block kh có thì lỗi thay semester thành block
        $course_name = find_by_block($block);
?>