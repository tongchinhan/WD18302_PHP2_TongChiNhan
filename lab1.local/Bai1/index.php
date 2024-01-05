<?php 
echo "PC06177 - Lab 1.1 <br>";
// mảng bắt đầu từ 0 
// $array = [

//     "Lập trình php 2",
//     "Lập trình javascript nâng cao",
//     "Kiểm thử cơ bản",
// ];
// echo $array['1'];

$course = [

        'block1' => 'Lập trình php 2',
        'block2' => 'Lập trình javascript nâng cao',
        'block3' => 'Kiểm thử cơ bản'
];

// echo $course['s1'];

//model
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB1.1</title>
</head>
<body>
    <h1><?= $course_name ?></h1>
   <form action="">
    <select name="block" id="">
        <?php foreach($course as $key =>$value){ ?>
            <option value="<?= $key ?>"><?= $value ?></option>

        <?php } ?> 
    </select>
    <button type="submit">Tìm Khóa Học</button>
   </form>
</body>
</html>
