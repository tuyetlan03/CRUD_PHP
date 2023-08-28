<?php
    include_once 'conect.php';
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM sinhvien WHERE MSV='$id'";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Xóa dữ liệu thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy sinh viên để xóa";
    }
?>
