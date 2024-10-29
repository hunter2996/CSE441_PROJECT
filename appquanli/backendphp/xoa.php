<?php
include "connect.php";
$id = isset($_POST['id']) ? $_POST['id'] : 0;

if ($id > 0) {
    // Nếu tất cả các trường có dữ liệu hợp lệ, thực hiện câu lệnh INSERT
    $query = 'DELETE FROM `sanphammoi` WHERE `id` = ' . $id;
    $data = mysqli_query($conn, $query);
    
    if ($data == true) {
        $arr = [
            'success' => true,
            'message' => "Xoá thành công"
        ];
    } else {
        $arr = [
            'success' => false,
            'message' => "Xoá thất bại"
        ];
    }
} else {
    // Nếu có trường rỗng, trả về thông báo lỗi
    $arr = [
        'success' => false,
        'message' => "Hãy chọn sản phẩm bạn muốn xoá"
    ];
}

echo json_encode($arr);
?>
