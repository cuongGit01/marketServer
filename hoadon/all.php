<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    try {

        $result = mysqli_query($conn, "SELECT * FROM hoadon");

        if (mysqli_num_rows($result) > 0) {
            $response["hoaDons"] = array();

            while ($row = mysqli_fetch_array($result)) {
                // temp user array
                $hoaDon = array();
                $hoaDon["maHoaDon"] = $row["maHoaDon"];
                $hoaDon["maNguoiDung"] = $row["maNguoiDung"];
                $hoaDon["maThanhToan"] = $row["maThanhToan"];
                $hoaDon["ngayGiaoDuKien"] = $row["ngayGiaoDuKien"];
                $hoaDon["ngayMua"] = $row["ngayMua"];
                $hoaDon["diaChi"] = $row["diaChi"];
                $hoaDon["tongTien"] = $row["tongTien"];
                $hoaDon["ngayThanhToan"] = $row["ngayThanhToan"];
                $hoaDon["maGiamGia"] = $row["maGiamGia"];
                $hoaDon["thanhToan"] = $row["thanhToan"];

                // push single hoaDon into final response array
                array_push($response["hoaDons"], $hoaDon);
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



} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}