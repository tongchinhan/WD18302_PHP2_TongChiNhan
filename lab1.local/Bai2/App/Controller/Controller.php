
<?php 
        include '../Model/MoDel.php';
        include '../Views/views.php';
      // $list_of_course = get_course();
      $block = (!empty($_GET['block']))? $_GET['block']: ''; // kiểm tra có block kh có thì lỗi thay semester thành block
      $course_name = find_by_block($block);
?>