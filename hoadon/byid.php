<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDon)) {
        try {
            $obj = $data->hoaDon;
            $maHoaDon = isset($obj->maHoaDon) ? $obj->maHoaDon : '';
            $result = mysqli_query($conn, "SELECT * FROM hoadon where maHoaDon=$maHoaDon");

            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);

                // temp user array
                $hoaDon = array();
                $hoaDon["maHoaDon"] = $result["maHoaDon"];
                $hoaDon["maNguoiDung"] = $result["maNguoiDung"];
                $hoaDon["maThanhToan"] = $result["maThanhToan"];
                $hoaDon["ngayGiaoDuKien"] = $result["ngayGiaoDuKien"];
                $hoaDon["ngayMua"] = $result["ngayMua"];
                $hoaDon["diaChi"] = $result["diaChi"];
                $hoaDon["tongTien"] = $result["tongTien"];
                $hoaDon["ngayThanhToan"] = $result["ngayThanhToan"];
                $hoaDon["maGiamGia"] = $result["maGiamGia"];
                $hoaDon["thanhToan"] = $result["thanhToan"];


                $response["success"] = 1;

                $response["hoaDon"] = $hoaDon;
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