<?php 
      function get_user($email) {
        include '../Config/config.php';
    
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $connection->prepare($sql);
    
        $stmt->bind_param("s", $email);
        
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if($result->num_rows > 0){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $stmt->close(); // Đóng statement tại đây
            $connection->close();
            return $row;
        }
    
        // Đóng statement và kết nối trong trường hợp không có dòng nào
        $stmt->close();
        $connection->close();
        
        // Nếu không tìm thấy người dùng, trả về null hoặc false hoặc xử lý theo logic của bạn
        return null;
    }
?>