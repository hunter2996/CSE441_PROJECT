<?php
include "connect.php";
$tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
$gia = isset($_POST['gia']) ? $_POST['gia'] : '';
$hinhanh = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : '';
$mota = isset($_POST['mota']) ? $_POST['mota'] : '';
$loai = isset($_POST['loai']) ? $_POST['loai'] : 0;
$id = isset($_POST['id']) ? $_POST['id'] : '';

if (!empty($tensp) && !empty($gia) && !empty($hinhanh) && !empty($mota) && $loai > 0) {
    // Nếu tất cả các trường có dữ liệu hợp lệ, thực hiện câu lệnh INSERT
    $query = '  UPDATE `sanphammoi` SET `tensp`="'.$tensp.'",`giasp`="'.$gia.'",`hinhanh`="'.$hinhanh.'",`mota`="'.$mota.'",`loai`='.$loai.' WHERE `id` = '.$id.'';
  
    $data = mysqli_query($conn, $query);
    
    if ($data == true) {
        $arr = [
            'success' => true,
            'message' => "Sửa sản phẩm thành công"
        ];
    } else {
        $arr = [
            'success' => false,
            'message' => "Sửa sản phẩm không thành công"
        ];
    }
} else {
    // Nếu có trường rỗng, trả về thông báo lỗi
    $arr = [
        'success' => false,
        'message' => "Vui lòng nhập đầy đủ thông tin sản phẩm"
    ];
}

echo json_encode($arr);
?>
