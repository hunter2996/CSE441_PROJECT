<?php
include "connect.php";
$target_dir = "images/";
$response = array();

// Truy vấn lấy max(id) từ bảng sanphammoi
$query = "SELECT MAX(id) as id FROM sanphammoi";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($data);

// Kiểm tra giá trị id lớn nhất và gán tên tệp
if ($row && $row['id'] !== null) {
    $name = $row['id'] + 1;
} else {
    $name = 1;
}

if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
    // Tạo tên file theo giá trị $name
    $name = $name . ".jpg";
    $target_file_name = $target_dir .$name;
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) {
        $response = [
            'success' => true,
            'message' => "Thành công",
            "name" => $name
        ];
    } else {
        $response = [
            'success' => false,
            'message' => "Thất bại khi di chuyển file"
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => "Vui lòng chọn ảnh hoặc kiểm tra lỗi tải lên"
    ];
}

echo json_encode($response);
?>
