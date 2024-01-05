
<?php
if (is_array($user) && isset($user['firstname']) && isset($user['lastname'])) {
    echo $user['firstname'] . " " . $user['lastname'];
} else {
    echo "Vui lòng nhập dữ liệu";
}
?>

<form action="" method="post">
        <input type="email" name="email">
        <input type="submit">
</form>