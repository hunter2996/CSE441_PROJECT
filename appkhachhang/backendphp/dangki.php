<?php
include "connect.php";

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
//check data
$query = 'SELECT * FROM `user` WHERE `email` = "'.$email.'"';
$data = mysqli_query($conn, $query);
$numrow = mysqli_num_rows($data);
if ($numrow ==1){
    $arr = [
        'success' => false,
        'message' => "Email da ton tai"
    ];
}else{
    $query = 'INSERT INTO `user`(`email`, `pass`, `username`, `mobile`) VALUES ("'.$email.'","'.$pass.'","'.$username.'","'.$mobile.'")';
    $data = mysqli_query($conn, $query);

    if ($data == true) {
        $arr = [
    'success' => true,
    'message' => "thanh cong"
        ];
        } else {
        $arr = [
    'success' => false,
    'message' => "khong thanh cong"
            ];
    }
}

print_r(json_encode($arr));

?>