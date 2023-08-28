<link rel="stylesheet" href="style.css">
<?php
    include_once 'conect.php';
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $gioitinh = $_POST['gioitinh'];
        $lop = $_POST['lop'];
        $khoa = $_POST['khoa'];
        if (!empty($hoten) && !empty($ngaysinh) && !empty($diachi) && !empty($gioitinh) && !empty($lop) && !empty($khoa)) {
        $sql_update = "UPDATE sinhvien SET HOTEN='$hoten', NGAYSINH='$ngaysinh', DIACHI='$diachi', GIOITINH='$gioitinh', LOP='$lop', KHOA='$khoa' WHERE MSV='$id'";
        }
        if ($conn->query($sql_update) === TRUE) {
            echo "Cập nhật dữ liệu thành công";
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }

    // Lấy thông tin sinh viên cần sửa
    if (isset($_GET['msv'])) {
        $msv = $_GET['msv'];
        $sql_get_student = "SELECT * FROM sinhvien WHERE MSV='$msv'";
        $result = $conn->query($sql_get_student);
        $student = $result->fetch_assoc();

        echo($student);
    } else {
        header("Location: index.php");
        exit();
    }
?>

<!-- Giao diện sửa dữ liệu -->
<div class="frame">
    <h2>Sửa Sinh Viên</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?=$student["MSV"]?>">
        <label for="hoten">Họ Tên:</label>
        <input type="text" name="hoten" value="<?=$student["HOTEN"]?>">
        <label for="ngaysinh">Ngày Sinh:</label>
        <input type="date" name="ngaysinh" class="with100" value="<?=$student["NGAYSINH"]?>">
        <label for="diachi">Địa chỉ:</label>
        <input type="text" name="diachi" value="<?=$student["DIACHI"]?>">
        <label for="gioitinh">Giới Tính:</label>
        <select class="with100" name="gioitinh" id="gioitinh">
            <option value="Nam" <?php if ($student["GIOITINH"] === "Nam") echo "selected"; ?>>Nam</option>
            <option value="Nữ" <?php if ($student["GIOITINH"] === "Nữ") echo "selected"; ?>>Nữ</option>
        </select>
        <label for="lop">Lớp:</label>
        <input type="text" name="lop" value="<?=$student["LOP"]?>">
        <label for="khoa">Khoa:</label>
        <input type="text" name="khoa" value="<?=$student["KHOA"]?>">
        <button type="submit" name="update">Cập nhật </button>
        <button > <a href="index.php">Trở Lại</a> </button>
        
    </form>
</div>
