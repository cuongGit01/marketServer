<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDonChiTiet)) {
        try {
            $obj = $data->hoaDonChiTiet;
            $maHoaDon = isset($obj->maHoaDon) ? $obj->maHoaDon : '';

            $result = mysqli_query($conn, "SELECT * FROM hoaDonChiTiet where maHoaDon = $maHoaDon");

            if (mysqli_num_rows($result) > 0) {
                $response["hoaDonChiTiets"] = array();

                while ($row = mysqli_fetch_array($result)) {
                    // temp user array
                    $hoaDonChiTiet = array();
                    $hoaDonChiTiet["maHoaDonChiTiet"] = $row["maHoaDonChiTiet"];
                    $hoaDonChiTiet["maHoaDon"] = $row["maHoaDon"];
                    $hoaDonChiTiet["maSanPham"] = $row["maSanPham"];
                    $hoaDonChiTiet["soLuong"] = $row["soLuong"];

                    // push single hoaDonChiTiet into final response array
                    array_push($response["hoaDonChiTiets"], $hoaDonChiTiet);
                }

                $response["success"] = 1;

                echo json_encode($response);
            } else {
                $response["result"] = 0;
                echo json_encode($response);
            }
        } catch (Exception $exc) {
            echo "Error add obj";
        }


        //

    } else {
        echo "No data request";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}