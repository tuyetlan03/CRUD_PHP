<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop ao quan</title>
    <link rel="stylesheet" href="style.css">

<?php
    include_once 'conect.php'; // nạp file kết nối database để truy suất dữ liệu
?>
</head>
<body>
    
    
<?php
    // Thêm dữ liệu sinh viên vào cơ sở dữ liệu khi người dùng nhấn nút "Thêm"
    // $hoten đây là tên biến tự đặt. $_POST đây là phương thức để thêm dữ liệu. ['hoten'] đây là name của ô input
    if (isset($_POST['add'])) {
        $hoten = $_POST['hoten'];  
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $gioitinh = $_POST['gioitinh'];
        $lop = $_POST['lop'];
        $khoa = $_POST['khoa'];

        // kiểm tra dữ liệu trống. nếu không rỗng thì cho phép add vào db 
        if (!empty($hoten) && !empty($ngaysinh) && !empty($diachi) && !empty($gioitinh) && !empty($lop) && !empty($khoa)) {
        $sql_insert = "INSERT INTO sinhvien (HOTEN, NGAYSINH, DIACHI, GIOITINH, LOP, KHOA)
                       VALUES ('$hoten', '$ngaysinh', '$diachi', '$gioitinh', '$lop', '$khoa')";
        
            // thêm thành công 
            if ($conn->query($sql_insert) === TRUE) {
                echo "Thêm dữ liệu thành công";
                $hoten = $ngaysinh = $diachi = $gioitinh = $lop = $khoa = "";
                // Chuyển hướng trình duyệt đến trang khác. để khi tải lại trang dữ liệu không lưu ở biến
                header("Location: index.php");
                exit(); // Đảm bảo dừng xử lý mã PHP sau khi chuyển hướng
            } 
            //Thêm thất bại
            else {
                echo "Lỗi: " . $conn->error;
            }
        }
        // nếu dữ liệu rỗng
        else{

            echo "Vui lòng điền đầy đủ thông tin.";
        }
    }
?>
<div class="frame">
    <h2>Sinh Viên</h2>
    <form method="POST">
        <label for="hoten">Họ Tên:</label>
        <input type="text" name="hoten">
        <label for="ngaysinh">Ngày Sinh:</label>
        <input type="date" name="ngaysinh" class="with100">
        <label for="diachi">Địa chỉ:</label>
        <input type="text" name="diachi">
        <label for="gioitinh">Giới Tính:</label>
        <select class="with100" name="gioitinh" id="gioitinh">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
        <label for="lop">Lớp:</label>
        <input type="text" name="lop">
        <label for="khoa">Khoa:</label>
        <input type="text" name="khoa">
        <button type="submit" id="create_product" name="add">Thêm </button>
        <button type="submit" id="create_product" name="search">Tìm Kiếm </button>
    </form>
</div>

<!-- Hiển thị danh sách sinh viên -->
<div class="frame">
    <h2>Danh Sách Sinh Viên</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Giới Tính</th>
            <th>Lớp</th>
            <th>Khoa</th>
            <th>Thao Tác</th>
        </tr>

        <?php
        // lấy thông tin ở bảng sinh viên
            
          
            if (isset($_POST['search'])) {
                $hoten = $_POST['hoten'];  
                if (!empty($hoten)){
                    $sql = "SELECT * FROM sinhvien where HOTEN Like '$hoten' ";
                }else{
                    $sql = "SELECT * FROM sinhvien";
                }
            }else{
                $sql = "SELECT * FROM sinhvien";// đây là câu lệnh truy vấn database
            }
            $result = $conn->query($sql);// đây là phần thực hiện truy vấn
            if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
                while ($row = $result->fetch_assoc()) 
            { // Sử dụng biến $row 
        ?>
            <tr>
                <td><?=$row["MSV"]?></td>
                <td><?=$row["HOTEN"]?></td>
                <td><?=$row["NGAYSINH"]?></td>
                <td><?=$row["DIACHI"]?></td>
                <td><?=$row["GIOITINH"]?></td>
                <td><?=$row["LOP"]?></td>
                <td><?=$row["KHOA"]?></td>
                <td>
                    <button><a href="update.php?msv=<?=$row["MSV"]?>">Sửa</a></button> <!-- Đưa ra trang riêng để sửa dữ liệu -->
                    <button> <a href="#" onclick="deleteStudent(<?=$row["MSV"]?>)">Xóa</a> <!-- Thêm onclick để gọi hàm xóa --></button>
                </td>
            </tr>
        <?php
            }
            } else {
                echo "Không có dữ liệu.";
            }
        ?>
    </table>
    <?php
?>
</div>
<script>
    function deleteStudent(id) {
        if (confirm("Bạn có chắc chắn muốn xóa sinh viên này?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete.php?id=" + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Tải lại trang để cập nhật danh sách sau khi xóa
                    window.location.reload();
                }
            };
            xhr.send();
        }
    }
</script>

</body>
</html>
