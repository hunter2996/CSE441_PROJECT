<?php
include "connect.php";
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$total = 5; // lấy 5 sản phẩm trên mỗi trang
$pos = ($page - 1) * $total;
$loai = isset($_POST['loai']) ? $_POST['loai'] : 1;

$query = "SELECT * FROM sanphammoi WHERE loai = '$loai' LIMIT $pos, $total";

$data = mysqli_query($conn, $query);
$result = array();
while ($row = mysqli_fetch_assoc($data)) {
    $result[] = ($row);
    
}
if (!empty($result)) {
    $arr = [
        'success' => true,
        'message' => "thanh cong",
        'result' => $result
    ];
} else {
    $arr = [
        'success' => false,
        'message' => "khong thanh cong",
        'result' => $result
    ];
}
print_r(json_encode($arr));

?>