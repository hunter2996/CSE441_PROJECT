<?php
include "connect.php";

$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$tongtien = isset($_POST['tongtien']) ? $_POST['tongtien'] : '';
$iduser = isset($_POST['iduser']) ? $_POST['iduser'] : 0;
$diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 0;
$chitiet = isset($_POST['chitiet']) ? $_POST['chitiet'] : '';


$query = 'INSERT INTO `donhang`(`iduser`, `diachi`, `sodienthoai`, `email`, `soluong`, `tongtien`) VALUES ('.$iduser.',"'.$diachi.'","'.$sdt.'","'.$email.'",'.$soluong.',"'.$tongtien.'")';

$data = mysqli_query($conn, $query);
if($data == true){
    $query = 'SELECT  id AS iddonhang FROM `donhang` WHERE `iduser` = '.$iduser.' ORDER BY id DESC LIMIT 1';
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        $iddonhang = ($row);
        
    }
    if(!empty($iddonhang)) {
        $chitiet = json_decode($chitiet, true);
        foreach($chitiet as $key => $value) {
            $qr = 'INSERT INTO `chitietdonhang`(`iddonhang`, `idsp`, `soluong`,`gia`) VALUES ('.$iddonhang["iddonhang"].','.$value["idsp"].','.$value["soluong"].',"'.$value["giasp"].'")';
            $data = mysqli_query($conn, $qr);
            
        }
        if($data == true){
            $arr = [
                'success' => true,
                'message' => "thanh cong",
            ];
        }else{
            $arr = [
                'success' => false,
                'message' => "khong thanh cong",
            ];
        }
    }

        }else{
            $arr = [
                'success' => false,
                'message' => "khong thanh cong",
            ];

            print_r(json_encode($arr));        
}
 


?>


