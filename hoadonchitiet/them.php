<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDonChiTiet)) {
        try {
            $obj = $data->hoaDonChiTiet;
            $maHoaDon = isset($obj->maHoaDon) ? $obj->maHoaDon : '';
            $maSanPham = isset($obj->maSanPham) ? $obj->maSanPham : '';
            $soLuong = isset($obj->soLuong) ? $obj->soLuong : '';

            $result = mysqli_query($conn, "INSERT INTO hoadonchitiet VALUES ('','$maHoaDon','$maSanPham','$soLuong')");

            if ($result) {
                $result = mysqli_query($conn, "SELECT maHoaDonChiTiet from hoadonchitiet ORDER BY maHoaDonChiTiet DESC LIMIT 1");
                $result = mysqli_fetch_array($result);
                $obj = array();
                $obj["maHoaDonChiTiet"] = $result["maHoaDonChiTiet"];

                $response["result"] = 1;
                $response["maHoaDonChiTiet"] = $obj;

                //array_push($response["obj"], $obj);

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