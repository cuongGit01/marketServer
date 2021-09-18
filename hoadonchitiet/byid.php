<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDonChiTiet)) {
        try {
            $obj = $data->hoaDonChiTiet;
            $maHoaDonChiTiet = isset($obj->maHoaDonChiTiet) ? $obj->maHoaDonChiTiet : '';
            $result = mysqli_query($conn, "SELECT * FROM hoaDonChiTiet where maHoaDonChiTiet=$maHoaDonChiTiet");

            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);

                // temp user array
                $hoaDonChiTiet = array();
                $hoaDonChiTiet["maHoaDonChiTiet"] = $result["maHoaDonChiTiet"];
                $hoaDonChiTiet["maHoaDon"] = $result["maHoaDon"];
                $hoaDonChiTiet["maSanPham"] = $result["maSanPham"];
                $hoaDonChiTiet["soLuong"] = $result["soLuong"];


                $response["success"] = 1;

                $response["hoaDonChiTiet"] = $hoaDonChiTiet;
                echo json_encode($response);
            } else {
                $response["result"] = 0;
                echo json_encode($response);
            }
        } catch (Exception $exc) {
            echo "Error add obj";
        }
    } else {
        echo "No data request";
    }


    //



} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}