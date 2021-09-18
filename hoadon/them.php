<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDon)) {
        try {
            $obj = $data->hoaDon;
            $maNguoiDung = isset($obj->maNguoiDung) ? $obj->maNguoiDung : '';
            $maThanhToan = isset($obj->maThanhToan) ? $obj->maThanhToan : '';
            $ngayGiaoDuKien = isset($obj->ngayGiaoDuKien) ? $obj->ngayGiaoDuKien : '';
            $ngayMua = isset($obj->ngayMua) ? $obj->ngayMua : '';
            $diaChi = isset($obj->diaChi) ? $obj->diaChi : '';
            $tongTien = isset($obj->tongTien) ? $obj->tongTien : '';
            $ngayThanhToan = isset($obj->ngayThanhToan) ? $obj->ngayThanhToan : '';
            $maGiamGia = isset($obj->maGiamGia) ? $obj->maGiamGia : '';
            $thanhToan = isset($obj->thanhToan) ? $obj->thanhToan : '';

            $result = mysqli_query($conn, "INSERT INTO hoadon VALUES ('','$maNguoiDung','$maThanhToan','$ngayGiaoDuKien','$ngayMua','$diaChi','$tongTien','$ngayThanhToan','$maGiamGia','$thanhToan')");

            if ($result) {
                $result = mysqli_query($conn, "SELECT maHoaDon from hoadon ORDER BY maHoaDon DESC LIMIT 1");
                $result = mysqli_fetch_array($result);
                $obj = array();
                $obj["maHoaDon"] = $result["maHoaDon"];

                $response["result"] = 1;
                $response["maHoaDon"] = $obj;

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